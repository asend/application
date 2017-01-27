@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Profil</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/new') }}">
				  		<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
				    		<label for="name">Nom</label>
				    		<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
				    		{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
				  		</div>
				  		<div class="form-group">
				    		<label for="description">Description</label>
				    		<textarea class="form-control" name="description" id="description" >
				    		</textarea>
				  		</div>
				  		<div class="form-group">
				        	<div class="col-md-6 col-md-offset-4">
				            	<button type="submit" class="btn btn-primary">
				                                     Save
				            	</button>
				        	</div>
				   		</div>
						<input type="hidden" value="{{ Session::token() }}" name="_token">
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
