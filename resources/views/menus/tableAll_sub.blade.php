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

                                    <a href="{{ url('/menus/patient/'.$patient->id.'') }}" rel="tooltip" title="Ver" class="btn btn-success">
                                        <i class="material-icons">info</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                </table>
