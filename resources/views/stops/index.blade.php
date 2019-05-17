@extends('layouts.app')

@section('content')

  @if(count($stops)>0)

      <div class="well">
        <table class="table">
          <thead>
            <tr>
              <th>Stop ID </th>
              <th>Ship Date</th>
              <th>City Name</th>
              <th>Movement ID</th>
              <th>Pick Up Type</th>
            </tr>
          </thread>
          @foreach ($stops as $stop)
          <tbody>
            <tr>
              <td>{{$stop->id}}</td>
              <td>{{$stop->actualArrival}}</td>
              <td>{{$stop->cityName}}</td>
              <td>{{$stop->movementId}}</td>
              <td>{{$stop->stopType}}</td>
              <td><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fullHeightModalRight">
                  Select
                </button>

                <!-- Full Height Modal Right -->
                <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">

                  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
                  <div class="modal-dialog modal-full-height modal-right" role="document">


                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Full Height Modal Right -->
              </td>
            </tr>
          </tbody>
          @endforeach

        </table>
        {{$stops->links()}}
      </div>


  @else
    <p>No Stops found</p>
  @endif
@endsection
