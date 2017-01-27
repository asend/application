@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;?>
            @foreach ($data as $row)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$row->name}}</td>
                  <td>
                      <a href="{{ route('editProfil',$row->id) }}" class="btn btn-warning z-depth-4 hoverable">Edit</a>
                      
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
    </div>
</div>
@endsection
