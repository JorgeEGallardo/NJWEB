@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Creacion de paciente')
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
      <h2 class="title">Añadir nuevo paciente</h2>
      <form method="post" action="{{ url('/patient/add') }}">
       @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre de usuario</label>
              <input type="texto" class="form-control" name="username" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Contraseña</label>
              <input type="texto" class="form-control" name="password" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre completo</label>

              <input type="texto" class="form-control" name="name" required>

            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-success">Crear</button>
        <a href="{{url ('/patient')}}" class="btn btn-danger"> Cancelar </a>
      </form>
    </div>
  </div>
</div>
@endsection
