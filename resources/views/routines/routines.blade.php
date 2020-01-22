@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Rutinas')
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
      @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
    <div class="section text-center">
      <h2 class="title">Rutinas</h2>
      @if(isset($routines[0]))
      <form method="post" action="{{ url('/rutinas/patient/'.$routines[0]->patient_id.'/delete') }}">
                        @csrf
                        {{ method_field('DELETE')}}


                        <button type="submit" rel="tooltip" title="eliminar rutina" class="btn btn-danger">
                            <i class="material-icons">close</i>Eliminar registros

                        </button>
                      </form>
                      @endif
      <div class="team">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Ejercicio</th>
                    <th>Series</th>
                    <th>repeticiones</th>
                    <th>Intensidad</th>
                    <th>Link</th>
                </tr>
            </thead>
            @foreach ($routines as $routine)
            <tbody>
                <tr>
                    <td>{{$routine->name}}</td>
                    <td>{{$routine->series}}</td>
                    <td>{{$routine->repetitions}}</td>
                    <td>{{$routine->intensity}}</td>
                    <td>{{$routine->link}}</td>
                    
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
    <a href ="{{ url('/rutinas') }}"class="btn btn-success btn-round">
      <i class="material-icons">keyboard_return</i> Regresar
    </a>
</div>
@endsection
