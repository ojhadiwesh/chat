@extends('layouts.app')

@section('content')

  @if(count($loads)>0)

      <div class="well">
        <table class="table">
          <thead>
            <tr>
              <th>Origin</th>
              <th>Destination</th>
              <th>PickUp Date</th>
            </tr>
          </thread>
          @foreach ($loads as $load)
          <tbody>
            <tr>
              <td>{{$load->originCity}}</td>
              <td>{{$load->destinationCity}}</td>
              <td>{{$load->pickupDate}}</td>
              <td><a href="/loads/{{$load->id}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Select</a></td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>


  @else
    <p>No Loads found</p>
  @endif
@endsection
