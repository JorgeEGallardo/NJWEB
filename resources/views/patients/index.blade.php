@extends('layouts.app')
@section('title', 'Pacientes')
@section('body-class','Pacientes')
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
            <h2 class="title">Pacientes </h2>
            <a href="{{ url('/patient/add') }}" class="btn btn-primary btn-round">
                        <i class="material-icons">add_box</i> Añadir nuevo paciente
            </a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Menú actual</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($patients as $patient)
                        <tbody>
                            <tr>
                                <td>{{$patient->fullname}}</td>
                                <td>{{$patient->description}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ url('/patient/'.$patient->id.'/view') }}" rel="tooltip" title="Ver" class="btn btn-success">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <a href="{{ url('/patient/'.$patient->id.'/agregar') }}" rel="tooltip" title="Cargar archivos del paciente " class="btn btn-success">
                                        <i class="material-icons">cloud_upload</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    <a href="{{ url('/') }}" class="btn btn-success btn-round">
                        <i class="material-icons">keyboard_return</i> Regresar
                    </a>
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
