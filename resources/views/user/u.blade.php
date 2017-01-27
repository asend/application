@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
		<div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
				<thead>
					<tr>
						<th class="text-center">Prenom</th>
						<th class="text-center">Nom</th>
						<th class="text-center">Localite</th>
						<th class="text-center">Responsabilite</th>
					</tr>
				</thead>
				@foreach($data as $item)
				<tr class="item{{$item->id}}">
					<td>{{$item->firstname}}</td>
					<td>{{$item->lastname}}</td>
					<td>{{$item->localite->name}}</td>
					<td>{{$item->role->name}}</td>
							
				</tr>
				@endforeach
			</table>
        </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#table').DataTable();
} );

</script>
@endsection
