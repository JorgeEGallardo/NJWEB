@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Pacientes')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/cover-index.png')">
  
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
                      <th>Nombre de la comida</th>
                      <th>Porcion</th>
                      <th>Paciente</th>
                      <th>Día</th>
                      <th>cat</th>
                      <th class="text-right">Actions</th>
                  </tr>
              </thead>
              @foreach ($menus as $menu)
              <tbody>
                  <tr>
                      <td>{{$menu->name}}</td>
                      <td>{{$menu->portion}}</td>
                      <td>{{$menu->username}}</td>
                      <td>{{$menu->days}}</td>
                      <td>{{$menu->menu_cats}}</td>
                      <td class="td-actions text-right">
                        <form method="post" action="{{ url('/menus/patient/'.$menu->id) }}">
                          @csrf
                          {{ method_field('DELETE')}}
                          <a href="{{ url('/menus/patient/'.$menu->id.'/edit') }}" rel="tooltip" title="editar menu" class="btn btn-success">
                              <i class="material-icons">edit</i>
                          </a>
                          <button type="submit" rel="tooltip" title="eliminar menu" class="btn btn-danger">
                              <i class="material-icons">close</i>
                          </button>
                        </form>
                      </td>
                  </tr>
              </tbody>
              @endforeach
          </table>
          <a href ="{{ url('/menus') }}"class="btn btn-success btn-round">
                  <i class="material-icons">keyboard_return</i> Regresar
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection