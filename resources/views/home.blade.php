@extends('layouts.app')

@section('title')
    Todo
@stop
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/mdb.min.css') }}">
@stop
@section('content')

    <div class="card">
        <h2 style="text-align: center;color:teal">Tasks List</h2><hr>
        
            <a href="{{ route('form') }}" class="btn btn-default center-block teal">Add Task</a>
        
    </div>
    <div class="card z-depth-3 hoverable">
       <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Task Name</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;?>
            @foreach ($data as $row)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->status}}</td>
                  <td>
                      <a href="{{ route('getEdit',$row->id) }}" class="btn btn-warning z-depth-4 hoverable">Edit</a>
                      
                      <form action="{{ route('deleteTask',$row->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are You Sure?')) {return true} else {return false};">
                      <input type="hidden" value="{{ Session::token() }}" name="_token">
                            <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
            <?php $i=$i+1;?>
            @endforeach
            
          </tbody>
        </table>
    </div>
@stop
