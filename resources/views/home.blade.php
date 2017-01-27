@extends('layouts.app')

@section('title')
    Todo
@stop
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/mdb.min.css') }}">
@stop
@section('content')
 <div class="row">  
 <!--{{ Auth::user()['name'] }}-->
 
   <div class="col-md-10 col-md-offset-1">
    <div class="row">
    @foreach ($regions as $row)
      <div class="col-md-4">
         <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-home fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">{{ $row->members }}</div>
            <div>{{ $row->name }}</div>
          </div>
        </div>
      </div>                
      <a href="#">
      <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
      </a>
    </div>
      </div>
    @endforeach
    </div>
   </div>
 </div>
@stop
