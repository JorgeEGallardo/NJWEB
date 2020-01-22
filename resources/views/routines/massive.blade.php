@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Creacion de rutina')
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
            @if ($errors->any())
        @foreach ($errors->all() as $error)
    <div class="alert alert-primary" style="background-color:blue important" role="alert">
{{$error}}
</div>
@endforeach
@endif
            <h2 class="title">Añadir rutina</h2>
            <form method="post" action="{{ url('/rutinas/patientMassive') }}">
                @csrf

                <div class="form-group col-sm-12">
                        <label>Paciente</label>
                        <select name="patient_id" class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                            <option value="{{$id}}">{{$name}}</option>
                        </select>
                    </div>
                <div class="form-group col-sm-12">
                    <label>Rutinas</label>
                    <textarea id="xd" onInput="awa();" name="raw"  class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Cargar rutinas</button>
                <a href="{{url ('/rutinas')}}" class="btn btn-danger"> Cancelar </a>
            </form>
        </div>
        <button type="button" style="margin:2rem; width: 16rem" class="btn btn-primary" onclick="newLine(); awa()">Nuevo renglón</button>
                <button type="button" style="margin:2rem; width: 16rem"class="btn btn-primary" onclick="newday(); awa()"> Nuevo día </button>
                <button type="button" style="margin:2rem; width: 16rem"class="btn btn-primary" onclick="limpiar(); awa()"> Limpiar todo </button>
    <form method="post" action="/rutinas/patientMassive2/{{$id}}">
            @csrf
        <div id="auch">
            <select name="patient_id2" class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                <option value="{{$id}}">{{$name}}</option>
            </select>
        </div>
    </form>
    </div>
</div>

<script>
var temp;
    function store(){
        temp = document.getElementById('xd').value;
    }
    function regresar(){
        var temp2 = temp;
        store();
        document.getElementById('xd').value = temp2;
    }
    function newLine(){
        store();
        var sr = ' 	 	 	 	 	- .com\r\n';
        document.getElementById('xd').value+=sr;
    }
    function newday(){
        store();
        var st = 'Día 1:  Glúteo, Femoral y Hombro  Ejercicio	Series	repeticiones	Intensidad	Descanso	Link \r\n';
        sr = ' 	 	 	 	 	- .com\r\n';
        document.getElementById('xd').value+=st+sr;
    }
    function limpiar(){
        store();
        document.getElementById('xd').value="";
    }
    function awa() {
        $.ajax({
            type: "POST",
            url: '{{url('/rutinas/temp')}}',
            data: $("form").serialize(),
            success: function(Response) {
                document.getElementById("auch").innerHTML = Response;
            }
        });
    }
</script>
@endsection
