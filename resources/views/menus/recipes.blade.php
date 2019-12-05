@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Recetas')
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
      <h2 class="title">Recetas</h2>
      <div class="team">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Comida</th>
                    <th>Ingredientes</th>
                    <th>procedimiento</th>
                    <!-- <th class="text-right">Acciones</th> -->
                </tr>
            </thead>
            @foreach ($recipes as $re)
            <tbody>
                <tr>
                    <td>{{$re->name}}</td>

                    <td>{{$re->ingredients}}</td>
                    <td>{{$re->procedure}}</td>
                   <!--  <td class="td-actions text-right">
                        <a href="{{ url('/menus/recipes/'.$re->id.'/edit') }}" rel="tooltip" title="editar menu" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                    </td> -->
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
