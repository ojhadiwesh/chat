@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <a href="/posts/create" class = "btn btn-primary"> Create Post</a>
                  <h3> Your blog posts!</h3>
                  <table class = "table table-stripped">
                    <tr>
                      <th>Title</th>
                      <th></th>
                      <th></th>
                    </tr>
                    @foreach ($posts as $post)
                      <tr>
                        <td><a href="/posts/{{$post->id}}">{{$post->title}}</td>
                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit</a></td>

                        <td>
                            {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=> 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                      </tr>

                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to the Dashboard!!

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
