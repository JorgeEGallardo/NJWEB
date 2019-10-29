@extends('layouts.app')
@section('title', 'Pacientes')
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

        <input type="text" class="m-5" id="str" placeholder="Buscar">
        <button type="button" onclick="search()" class="btn btn-primary">Buscar</button>
        <div id="table">
    <div class="container">
            <div class="section text-center">
                    <h2 class="title">Pacientes </h2>

                    <div class="team">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th class="text-center">#</th> -->
                                        <th>Nombre</th>
                                        <th>Nombre de usuario</th>
                                        <th>Menú actual</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>
                                    @foreach ($patients as $patient)
                                    <tbody>
                                        <tr>
                                            <!-- <td class="text-center">{{$patient->id}}</td> -->
                                            <td>{{$patient->fullname}}</td>
                                            <td>{{$patient->username}}</td>
                                            <td>{{$patient->description}}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ url("/menus/patientMassive/$patient->id") }}" class="btn btn-primary">
                                                    <i class="material-icons">add_box</i>
                                                </a>
                                                <a href="{{ url("/menus/Asignar/$patient->id") }}" class="btn btn-primary">
                                                    <i class="material-icons">archive</i>
                                                </a>
                                                <a href="{{ url('/menus/patient/'.$patient->id.'') }}" rel="tooltip" title="Ver" class="btn btn-success">
                                                    <i class="material-icons">info</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                            {{ $patients->links() }}
                    <a href="{{ url('/') }}" class="btn btn-success btn-round">
                        <i class="material-icons">keyboard_return</i> Regresar
                    </a>
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
                url: '{{url('/menus/getMPatients')}}',
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
