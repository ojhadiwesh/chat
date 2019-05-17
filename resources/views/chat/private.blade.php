@extends('layouts.app')

@section('content')
<div class="container" id="app2">
  <div class="row">
  <div class="column">
    <a   class="btn btn-outline-primary" href="/chat"><li class="list-group-item active">Sonwil Chat Room </li></a>
  @if (count($users)>0)
    @foreach ($users as $user)
      <a href="/chat/{{$user->id}}"><li class="list-group-item">{{$user->name}}</li></a>
    @endforeach
  @endif
  </div>
  <div class="offset-4 col-6 offset-sm-1 col-sm-15">
  <ul class="list-group " v-chat-scroll>
  <message v-for="value, index in chat.message" :key=value.index :color=chat.color[index] :user = chat.user[index] :time=chat.time[index]>

  @{{value}}

  </message>
  </ul>
  <input type="text" class="form-control" placeholder="Type your message here" v-model="message" @keyup.enter='send'>
</div>
</div>
</div>
@endsection
