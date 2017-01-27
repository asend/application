@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Localite</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/postLocalite') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="departement" class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                                <select class="form-control input-sm" name="type" id="type">
                                    <option value="Region">Region</option>
                                    <option value="Departement">Departement</option>
                                    <option value="Commune">Section</option>
                                    <option value="Comite">Comite</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-group" id="bloc_region">
                            <label for="commune" class="col-md-4 control-label" id="region_label">Region</label>
                            <div class="col-md-6">
                                <select class="form-control" name="region" id="region">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="bloc_departement">
                            <label for="commune" class="col-md-4 control-label" id="departement_label">Departement</label>
                            <div class="col-md-6">
                                <select class="form-control" name="departement" id="departement">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="bloc_commune">
                            <label for="commune" class="col-md-4 control-label" id="departement_label">Section</label>
                            <div class="col-md-6">
                                <select class="form-control" name="commune" id="commune">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-home"></i> Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $("#bloc_region").hide();
    $("#bloc_departement").hide();
    $("#bloc_commune").hide();
    var data = <?php echo $regions; ?>;
    $("#type").change(function() 
    {
        $("#bloc_region").hide();
        $("#bloc_departement").hide();
        $("#bloc_commune").hide();
            $('#departement').empty();
            $('#region').empty();
            $('#commune').empty();
        console.log($(this).val());
        if ($(this).val() == "Departement") {
            $('#bloc_region').show();
            $('#region').empty();
            $('#departement').empty();
            
            console.log(data);
            $.each(data, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        }
        if ($(this).val() == "Commune") {
            $('#bloc_region').show();
            $('#bloc_departement').show();
            $('#region').empty();
            $('#departement').empty();
            $.each(data, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        $('#region').change(function(){
            //$('#departement').empty();
            console.log($(this).val());
            //ajax-region-departement
            var region_id = $(this).val();
        $.get('/ajax-region-departement?id='+region_id, function(data){
            //alert(data);
            $('#departement').empty();

            $('#departement').append('<option value=""></option>');
            $.each(data, function(index, subObject){
                $('#departement').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        });
        });

        }
        if ($(this).val() == "Comite") {
            $('#bloc_region').show();
            $('#bloc_departement').show();
            $('#bloc_commune').show();
            $('#region').empty();
            $('#departement').empty();
            $('#commune').empty();
            $.each(data, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
            $('#region').change(function(){
            //$('#departement').empty();
            console.log($(this).val());
            //ajax-region-departement
            var region_id = $(this).val();
            $.get('/ajax-region-departement?id='+region_id, function(data){
            //alert(data);
            $('#departement').empty();

            $('#departement').append('<option value=""></option>');
            $.each(data, function(index, subObject){
                $('#departement').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        });
        });
            $('#departement').change(function(){
                console.log($(this).val());
            //ajax-region-departement
            var region_id = $(this).val();
            $.get('/ajax-region-departement?id='+region_id, function(data){
            //alert(data);
            $('#commune').empty();

            $('#commune').append('<option value=""></option>');
            $.each(data, function(index, subObject){
                $('#commune').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        });
            });
        }
    });
   

  /*$("#departement").change(function(e) 
    {
        $('#commune').empty();
        //console.log(e);
        //alert(e.target.value);
        var dpt_id = e.target.value;
        $.get('/ajax-departement-commune?id='+dpt_id, function(data){
            //alert(data);
            $('#commune').append('<option value=""></option>');
            $.each(data, function(index, subObject){
                $('#commune').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        });
    });*/
    
 </script>
@endsection
