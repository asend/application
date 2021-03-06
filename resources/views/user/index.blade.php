@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @foreach ($data as $row)
            <div class="media">
  				<div class="media-left">
				    <a href="#">
				      <img class="media-object" src="..." alt="Generic placeholder image">
				    </a>
  				</div>
				<div class="media-body">
				    <h4 class="media-heading">{{ $row->role_id }}</h4>
				    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
				    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				</div>
			</div>
		@endforeach

		{{ $data->render() }}
        </div>
    </div>
</div>
@endsection
