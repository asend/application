@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telephone</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                        
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="region" class="col-md-4 control-label">Profil</label>
                            <div class="col-md-6">
                                <select class="form-control" name="role_id" id="role">
                                    <option value=""></option>
                                    @foreach($profils as $profil)
                                        <option value="{{$profil->id}}">{{$profil->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="bloc_region">
                            <label for="region" class="col-md-4 control-label">Regions</label>
                            <div class="col-md-6">
                                <select id="region" class="form-control" >
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="bloc_departement">
                            <label for="departement" class="col-md-4 control-label">Departements</label>
                            <div class="col-md-6">
                                <select class="form-control input-sm" id="departement">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="bloc_commune">
                            <label for="commune" class="col-md-4 control-label">Sections</label>
                            <div class="col-md-6">
                                <select class="form-control" id="commune">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="bloc_comite">
                            <label for="commune" class="col-md-4 control-label">Comite</label>
                            <div class="col-md-6">
                                <select class="form-control" id="comite">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
    var regions = <?php echo $regions; ?>;
    $("#bloc_region").hide();
    $("#bloc_departement").hide();
    $('#bloc_commune').hide();
    $('#bloc_comite').hide();

    $('#role').change(function(e){
        $("#region").empty();
        $("#departement").empty();
        $('#commune').empty();
        $('#comite').empty();
        $("#bloc_region").hide();
        $("#bloc_departement").hide();
        $('#bloc_commune').hide();
        $('#bloc_comite').hide();
        console.log(e.target.value);
        if (e.target.value == 4){
            $("#bloc_region").show();
            $("#region").attr('name', 'localite_id');
            $('#region').append('<option value=""></option>');

            $.each(regions, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });

        }
        if (e.target.value == 3){
            $("#bloc_region").show();
            $("#bloc_departement").show();
            $("#departement").attr('name', 'localite_id');
            $('#region').append('<option value=""></option>');

            $.each(regions, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });

        }
        if (e.target.value == 2){
            $("#bloc_region").show();
            $("#bloc_departement").show();
            $("#bloc_commune").show();
            $("#commune").attr('name', 'localite_id');
            $('#region').append('<option value=""></option>');

            $.each(regions, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });

        }
        if (e.target.value == 1){
            $("#bloc_region").show();
            $("#bloc_departement").show();
            $("#bloc_commune").show();
            $("#bloc_comite").show();
            $("#comite").attr('name', 'localite_id');
            $('#region').append('<option value=""></option>');

            $.each(regions, function(index, subObject){
                $('#region').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });

        }
    });

  $("#region").change(function(e) 
    {
        $('#departement').empty();
        $('#commune').empty();
        $('#comite').empty();
        //$('#region').empty();
        console.log(e.target.value);
        //alert(e.target.value);
        var region_id = e.target.value;
        $.get('/ajax-region-departement?id='+region_id, function(data){
            //alert(data);
            $('#departement').append('<option value=""></option>');
            $.each(data, function(index, subObject){
                $('#departement').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        });
    });

  $("#departement").change(function(e) 
    {
        $('#commune').empty();
        $('#comite').empty();
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
    });
  $("#commune").change(function(e) 
    {
        $('#comite').empty();
        //console.log(e);
        //alert(e.target.value);
        var dpt_id = e.target.value;
        $.get('/ajax-departement-commune?id='+dpt_id, function(data){
            //alert(data);
            $('#comite').append('<option value=""></option>');
            $.each(data, function(index, subObject){
                $('#comite').append('<option value="'+subObject.id+'">'+subObject.name+'</option>');
            });
        });
    });
    
 </script>
@endsection
