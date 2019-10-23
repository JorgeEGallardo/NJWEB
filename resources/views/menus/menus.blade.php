@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Pacientes')
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
      @if(isset($menus[0]))
      <form method="post" action="{{ url('/menus/patient/'.$menus[0]->patient_id.'/delete') }}">
                        @csrf
                        {{ method_field('DELETE')}}


                        <button type="submit" rel="tooltip" title="eliminar dieta" class="btn btn-danger">
                            <i class="material-icons">close</i>Eliminar registros

                        </button>
                      </form>
                      @endif
      <div class="team">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Comida</th>
                    <!-- <th>Porcion</th>
                    <th>Paciente</th> -->
                    <th>Día</th>
                    <th>Tipo</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            @foreach ($menus as $menu)
            <tbody>
                <tr>
                    <td>{{$menu->name}}</td>
                    <!-- <td>{{$menu->portion}}</td>
                    <td>{{$menu->username}}</td> -->
                    <td>{{$menu->days}}</td>
                    <td>{{$menu->menu_cats}}</td>
                    <td class="td-actions text-right">
                        <a href="{{ url('/menus/patient/'.$menu->id.'/edit') }}" rel="tooltip" title="editar menu" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
    <a href ="{{ url('/menus') }}"class="btn btn-success btn-round">
      <i class="material-icons">keyboard_return</i> Regresar
    </a>
</div>
@endsection
