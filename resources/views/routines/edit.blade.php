@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Edicion')
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
      <h2 class="title">Editar rutina selecionada</h2>
      <form method="post" action="{{ url('/menus/patient/'.$menu->id.'/edit') }}">
       @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group label-floating">
              <label class="control-label">Comida</label>
              <input type="texto" class="form-control" name="name" value="{{ $menu->name}}" required>
            </div>
          </div>
<!--           <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Porcion</label>
              <input type="texto" class="form-control" name="portion" value="{{ $menu->portion}}" required>
            </div>
          </div> -->
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="exampleFormControlSelect1">Tipo de comida</label>
            <select name ="cat_id"class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
            <option value="1">Desayuno</option>
            <option value="2">Colacion1</option>
            <option value="3">Comida</option>
            <option value="4">Colacion2</option>
            <option value="5">Cena</option>
            <option value="6">Colacion3</option>
            <option value="7">Colacion4</option>
            <option value="8">Colacion5</option>
            </select>
          </div>
          <div class="form-group col-sm-6">

            <label for="exampleFormControlSelect1">Dias</label>
            <select name ="day_id" class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miercoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sabado</option>
            <option value="7">Domingo</option>
            </select>
          </div> 
          <!-- <div class="form-group col-sm-4">
            <label for="exampleFormControlSelect1">Pacientes</label>
            <select name ="patient_id" class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
              @foreach ($patients as $patient)
              <option value="{{$patient->id}}">{{$patient->username}}</option>
              @endforeach
            </select>
          </div> -->
        </div>
        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{url ('/menus')}}" class="btn btn-danger"> Cancelar </a>
      </form>
    </div>
  </div>
</div>
@endsection