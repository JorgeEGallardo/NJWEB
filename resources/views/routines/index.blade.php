@extends('layouts.app')
@section('title', 'Rutinas')
@section('body-class','profile-page')
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
                    <h2 class="title">Rutinas</h2>
                        <input type="text" class="form-control col-md-12" id="str" placeholder="Buscar">
                        <button type="button" onclick="search()" class="btn btn-success">Buscar</button>
                        <div id="table">
                    <div class="team">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre de usuario</th>
                                        <th>Nombre</th>
                                        <th>Observaciones</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>
                                    @foreach ($patients as $patient)
                                    <tbody>
                                        <tr>
                                            <!-- <td class="text-center">{{$patient->id}}</td> -->
                                            <td>{{$patient->username}}</td>
                                            <td>{{$patient->fullname}}</td>
                                            <td><?php
                                            $split  = explode(';', $patient->note);
                                            foreach ($split as $clean) {
                                                echo $clean."<br>";
                                            }
                                            ?></td>
                                            <td class="td-actions text-right">
                                                <a href="{{ url("/rutinas/patientMassive/$patient->id") }}" rel="tooltip" title="Añadir rutina" class="btn btn-success">

                                                    <i class="material-icons">add_box</i>
                                                </a>
                                                <a href="{{ url('/rutinas/patient/'.$patient->id.'') }}" rel="tooltip" title="Ver" class="btn btn-success">
                                                    <i class="material-icons">info</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                            <a href="{{ url('/') }}" class="btn btn-success btn-round">
                                <i class="material-icons">keyboard_return</i> Regresar
                            </a>
                            <div id="center">
                                {{ $patients->links() }}
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
        function search() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: '{{url('/rutinas/getMPatients')}}',
                data: {
                    "search": document.getElementById("str").value
                },
                success: function(Response) {
                    document.getElementById("table").innerHTML = Response;
                }
            });
        }
    </script>
@endsection
