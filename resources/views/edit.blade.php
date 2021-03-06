@extends('layouts.app')

@section('title')
    Todo
@stop
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/mdb.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/main.css') }}">
@stop
@section('content')
	<div class="container">
		<div class="card z-depth-3">
		@if(count($errors)>0)
			<section class="info-box fail">
				@foreach($errors->all() as $error)
					{{$error}}
				@endforeach
			</section>
		@endif
		</div>
		<div class="card hoverable">
			<h2 style="text-align: center;color:#0097A7;padding-bottom:16px" class="z-depth-1">Edit</h2>
			<form action="{{route('postUpdate', $data->id)}}" method="POST" class="form-inline" style="text-align: center">
				
				<input type="text" name="name" value="{{$data->name}}" class="form-control hoverable" style="text-align: center"><br>

				<input type="text" name="status" class="form-control hoverable" value="{{$data->status}}" style="text-align: center"><br>
				
				<input type="submit" class="btn btn-warning hoverable z-depth-4" value="Update" style="margin-bottom:20px;padding-top:5px">
				
				<input type="hidden" value="{{ Session::token() }}" name="_token">
			</form>
		</div>
	</div>
@stop