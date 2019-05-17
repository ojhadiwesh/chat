@extends('layouts.app')

@section('content')

  <h1>Post Load</h1>
  {!! Form::open(['action' => 'loadController@store', 'method'=>'POST']) !!}
  <div class="form-group">
    {!! Form::select('type', array('LTL' => 'LTL', 'TL' => 'TL'), null, array('class' => 'form-control')) !!}
  </div>
	 <div class= "form-group">
     <div class="form-row">
       <div class="col">
    {{Form::text('originCity', '',['class'=>'form-control', "placeholder"=>'Origin City'] )}}
       </div>
       <div class="col">
    {{Form::text('originState', '',['class'=>'form-control', "placeholder"=>'Origin State'] )}}
       </div>
    </div>
    <ul></ul>
    <div class="form-row">
      <div class="col">
   {{Form::text('destinationCity', '',['class'=>'form-control', "placeholder"=>'Destination City'] )}}
      </div>
      <div class="col">
   {{Form::text('destinationState', '',['class'=>'form-control', "placeholder"=>'Destination State'] )}}
      </div>
   </div>
   <hr></hr>
   <div class="form-row">
     <div class="col">
  {{Form::text('distance', '',['class'=>'form-control', "placeholder"=>'Distance'] )}}
     </div>
     <div class="col">
  {{Form::text('pickupDate', '',['class'=>'form-control', "placeholder"=>'PickUp Date'] )}}
     </div>
     <div class="col">
  {{Form::text('rate', '',['class'=>'form-control', "placeholder"=>'Rate(in Dollars)'] )}}
     </div>
     <div class="col">
  {{Form::text('weight', '',['class'=>'form-control', "placeholder"=>'Weight(in Pounds)'] )}}
     </div>

  </div>
  </div>

 {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}

@endsection
