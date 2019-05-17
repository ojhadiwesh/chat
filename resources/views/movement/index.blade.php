@extends('layouts.app')

@section('content')

  @if(count($movements)>0)

      <div class="well">
        <table class="table">
          <thead>
            <tr>
              <th>Movement ID </th>
              <th>Origin Stop Id</th>
              <th>Dest Stop Id</th>
              <th>Dispacther</th>
              <th>Brokerage Status</th>
              <th>Target Pay</th>
            </tr>
          </thread>

          <tbody>
            @foreach ($movements as $movement)
            <tr>
              <td>{{$movement->id}}</td>
              <td>{{$movement->originStopId}}</td>
              <td>{{$movement->destStopId}}</td>
              <td>{{$movement->dispatcherUserId}}</td>
              <td>{{$movement->brokerageStatus}}</td>
              <td>{{$movement->targetPayValue}}</td>
              <td><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Details
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Movement Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {{$movement->id}}
                      <hr>{{$movement->brokerageStatus}}</hr>
                        <hr>{{$movement->originStopId}}</hr>
                        <hr>{{$movement->destStopId}}</hr>
                        <hr>{{$movement->dispatcherUserId}}</hr>
                        <hr>{{$movement->targetPayValue}}</hr>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td> 
            </tr>
            @endforeach
          </tbody>


        </table>
        {{$movements->links()}}
        <!-- Search form -->
        <form class="form-inline md-form form-sm mt-0">
          <i class="fas fa-search" aria-hidden="true"></i>
          <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>


  @else
    <p>No Movement found</p>
  @endif
@endsection
