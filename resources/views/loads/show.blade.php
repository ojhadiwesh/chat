@extends('layouts.app')

@section('content')
  <a href ="/loads" class = "btn btn-default"> Go Back</a>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Origin City</th>
        <th>Origin State</th>
        <th>Destination City</th>
        <th>Destination State</th>
        <th>Pickup Date</th>
        <th>Move Distance</th>
        <th>Type</th>
        <th>Rate</th>
        <th>Weight</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{!!$load->id!!}</td>
        <td>{!!$load->originCity!!}</td>
        <td>{!!$load->originState!!}</td>
        <td>{!!$load->destinationCity!!}</td>
        <td>{!!$load->destinationState!!}</td>
        <td>{!!$load->pickupDate!!}</td>
        <td>{!!$load->distance!!}</td>
        <td>{!!$load->type!!}</td>
        <td>{!!$load->rate!!}</td>
        <td>{!!$load->weight!!}</td>
        <td><a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Bid</a></td>
      </tr>
    </tbody>
  </table>
  <a href="/loads/{{$load->id}}/edit" class = "btn btn-default">Edit</a>
  {!!Form::open(['action'=>['loadController@destroy', $load->id], 'method'=> 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
  {!!Form::close()!!}
@endsection
