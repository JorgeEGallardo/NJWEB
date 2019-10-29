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
                    <td>{{$dato->username}}</td>
                    <td>{{$dato->password}}</td>
                    <td>{{$dato->description}}</td>
                    <td>{{$dato->note}}</td>
                    <td class="td-actions text-right">
                    <form method="post" action="{{ url('/patient/'.$dato->id.'/delete') }}">
                        @csrf
                        {{ method_field('DELETE')}}
                        <a href="{{ url('/patient/'.$dato->id.'/edit') }}" rel="tooltip" title="editar paciente" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                        <button type="submit" rel="tooltip" title="eliminar paciente" class="btn btn-danger">
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
@endsection
