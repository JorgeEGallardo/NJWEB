@extends('layouts.app')
@section('title', 'Pacientes')
@section('body-class','profile-page')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/cover-index.png')">
  
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Pacientes</h2>
      <div class="team">
        <div class="row">
        
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th class="text-right">Acciones</th>

                </tr>
            </thead>
            @foreach ($patients as $patient)
            <tbody>
                <tr>
                    <td class="text-center">{{$patient->id}}</td>
                    <td>{{$patient->username}}</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Añadir menu" class="btn btn-success">
                            <i class="material-icons" >add_box</i>
                        </button>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection