@extends('layouts.app')

@section('content')

  <h1>Edit Load</h1>
  {!! Form::open(['action' => ['loadController@update',$load->id], 'method'=>'POST']) !!}
	<div class= "form-group">
     <div class="form-row">
       <div class="col">
    {{Form::text('originCity', $load->originCity,['class'=>'form-control', "placeholder"=>'Origin City'] )}}
       </div>
       <div class="col">
    {{Form::text('originState', $load->originState,['class'=>'form-control', "placeholder"=>'Origin State'] )}}
       </div>
     </div>
     <ul></ul>
     <div class="form-row">
      <div class="col">
   {{Form::text('destinationCity', $load->destinationCity,['class'=>'form-control', "placeholder"=>'Destination City'] )}}
      </div>
      <div class="col">
   {{Form::text('destinationState', $load->destinationState,['class'=>'form-control', "placeholder"=>'Destination State'] )}}
      </div>
    </div>
    <hr></hr>
    <div class="form-row">
     <div class="col">
  {{Form::text('distance', $load->distance,['class'=>'form-control', "placeholder"=>'Distance'] )}}
     </div>
     <div class="col">
  {{Form::text('pickupDate', $load->pickupDate,['class'=>'form-control', "placeholder"=>'PickUp Date'] )}}
     </div>
    </div>
  </div>
 {{Form::hidden('_method', 'PUT')}}
 {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}

@endsection
