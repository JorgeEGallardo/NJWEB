@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Creacion de Dieta')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/cover-index.png')">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Adara wellness & spa</h1>
                <h4>Sistema de administracion de WellnessPal</h4>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Añadir menu</h2>
            <form method="post" action="{{ url('/menus/patientMassive') }}">
                @csrf

                <div class="form-group col-sm-12">
                        <label>Paciente</label>
                        <select name="patient_id" class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                            <option value="{{$id}}">{{$name}}</option>
                        </select>
                    </div>
                <div class="form-group col-sm-12">
                    <label>Menus</label>
                    <textarea id="xd" onInput="awa();" ; name="raw" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label>Recetas</label>
                    <textarea name="rec" onInput="awa();" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label>Descripción</label>
                    <textarea name="desc" class="form-control" rows="3" ></textarea>
                </div>

                <button type="submit" class="btn btn-success">Crear menu</button>
                <a href="{{url ('/menus')}}" class="btn btn-danger"> Cancelar </a>
            </form>
        </div>
        <div id="auch">

        </div>
    </div>
</div>
<script>
    function awa() {
        $.ajax({
            type: "POST",
            url: '{{url('/menus/temp')}}',
            data: $("form").serialize(),
            success: function(Response) {
                document.getElementById("auch").innerHTML = Response;
            }
        });
    }
</script>
@endsection
