@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Paciente')
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
      <h2 class="title">Paciente</h2>
      <div class="team">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Contraseña</th>
                    <th>Descripcion</th>
                    <th>Observación</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            @foreach ($data as $dato)
            <tbody>
                <tr>
                    <td>{{$dato->fullname}}</td>
                    <td>{{$dato->description}}</td>
                    <td><?php

                    $split  = explode(';', $dato->note);
                    foreach ($split as $clean) {
                        echo $clean."<br>";
                    }
                    ?></td>
                    <td class="td-actions text-right">

                      <form >
                          <a href="{{ url('/patient/'.$dato->id.'/edit') }}" rel="tooltip" title="editar paciente" class="btn btn-success">
                          <i class="material-icons">edit</i>
                          </a>
                    <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" rel="tooltip" title="eliminar paciente" data-toggle="modal" data-target="#delete">
                          <i class="material-icons">close</i>
                          </button>
                      </form>

                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
    <a href ="{{ url('/patient') }}"class="btn btn-success btn-round">
      <i class="material-icons">keyboard_return</i> Regresar
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">¡Alerta!</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5> Estas apunto de eliminar todos los datos relacionados con el paciente -{{$dato->fullname}}- </h5>
        <h4> ¿Seguro que deseas continuar?</h4>
      </div>
      <div class="modal-footer">
      <form method="post" action="{{ url('/patient/'.$dato->id.'/delete') }}">
        @csrf
        {{ method_field('DELETE')}}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Si</button>
    </form>
      </div>
    </div>
  </div>
</div>
@endsection
