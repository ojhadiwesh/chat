@extends('layouts.app')

@section('content')
  <style>
      .list-group{
        overflow-y: scroll;
        height: 200px;
      }

  </style>
    <div class="container" id="app2">

      <div class="row">
        <div class="column">
        @if (count($users)>0)
          @foreach ($users as $user)
            <a href="/chat/{{$user->id}}"><li class="list-group-item">{{$user->name}}</li></a>
          @endforeach
        @endif
        </div>
        <div class="offset-4 col-6 offset-sm-1 col-sm-15">

          <li class="list-group-item active">Sonwil Chat Room <span class="badge badge-pill badge-danger">Online users @{{numberOfUsers}}</span></li>
          <div class="badge badge-pill badge-primary">@{{ typing }}</div>
          <ul class="list-group " v-chat-scroll>

          <message v-for="value, index in chat.message" :key=value.index :color=chat.color[index] :user = chat.user[index] :time=chat.time[index]>

          @{{value}}

        </message>

        </ul>

        <input type="text" class="form-control" placeholder="Type your message here" v-model="message" @keyup.enter='send'>
      </div>
    </div>
  </div>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
  </body>
</html>
@endsection
