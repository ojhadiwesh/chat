

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
import Toaster from 'v-toaster'
Vue.use(Toaster, {timeout: 5000})
import 'v-toaster/dist/v-toaster.css'
Vue.component('message', require('./components/message.vue'));
Vue.component('PrivateChat', require('./components/PrivateChat.vue'));



const app = new Vue({
    el: '#app2',
    data: {
        message:'',
        chat:{
          message:[],
          user:[],
          color:[],
          time:[]
        },
        typing:'',
        numberOfUsers:0,
        onlineUsers:[]
    },
    watch:{
      message(){
        Echo.private('chat')
          .whisper('typing', {
            name: this.message
    });
      }
    },
    methods:{
      send(){
        if (this.message.length != 0) {
          this.chat.message.push(this.message);
          this.chat.user.push('you');
          this.chat.color.push('success');
          this.chat.time.push(this.getTime());


          axios.post('/send', {
            message: this.message,
            chat:this.chat
          })
          .then(response => {
            console.log(response);
            this.message=''
          })
          .catch(error => {
            console.log(error);
          });
        }
      },
      getTime(){
        let time = new Date();
        return time.getHours()+':'+time.getMinutes();
      },
      getOldMessages(){
        axios.post('/getOldMessage')
        .then(response=>{
          console.log(response);
          if(response.data != ''){
            this.chat = response.data;
          }
        })
        .catch(error=>{
          console.log(error);
        });
      }
    },
    mounted(){
      Echo.private('chat')
          .listen('ChatEvent', (e) => {
            this.chat.message.push(e.message);
            this.chat.user.push(e.user);
            this.chat.color.push('warning');
            this.chat.time.push(this.getTime());
            axios.post('/saveToSession', {
              chat : this.chat
            })
              .then(response=>{
              })
              .catch(error=>{
                console.log(error);
              });



            // console.log(e);
          })
          .listenForWhisper('typing', (e) => {
            if(e.name != ''){
              this.typing = 'typing...'
            }else{
              this.typing=''
            }

          });
          Echo.join(`chat`)
          .here((users) => {
            this.numberOfUsers = users.length;
            this.onlineUsers = users;

            // console.log(users);
          })
          .joining((user) => {
            this.numberOfUsers += 1;
            this.onlineUsers.append(user.name);
            this.$toaster.success(user.name +' has joined the chat Room.')
            Event.$emit('users.joined', users);

            // console.log(user.name);
          })
          .leaving((user) => {
            this.numberOfUsers -= 1;
            this.$toaster.warning(user.name +' has left the chat Room.')
            Event.$emit('users.left', users);

              // console.log(user.name);
          });
    }
});
