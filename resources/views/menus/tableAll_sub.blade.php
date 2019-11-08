
<div class="team">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <!-- <th class="text-center">#</th> -->
                    <th>Nombre de usuario</th>
                    <th>Nombre </th>
                    <th>Menú actual</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
                @foreach ($patients as $patient)
                <tbody>
                    <tr>
                        <!-- <td class="text-center">{{$patient->id}}</td> -->
                        <td>{{$patient->username}}</td>
                        <td>{{$patient->fullname}}</td>
                        <td>{{$patient->description}}</td>
                        <td class="td-actions text-right">
                            <a href="{{ url("/menus/patientMassive/$patient->id") }}" rel="tooltip" title="Añadir" class="btn btn-success">
                                <i class="material-icons">add_box</i>
                            </a>
                            <!-----
                            <a href="{{ url("/menus/Asignar/$patient->id") }}" class="btn btn-primary">
                                <i class="material-icons">archive</i>
                            </a>
                        ------>
                            <a href="{{ url('/menus/patient/'.$patient->id.'') }}" rel="tooltip" title="Ver" class="btn btn-success">
                                <i class="material-icons">info</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
        </table>
        <a href ="{{ url('/menus') }}"class="btn btn-success btn-round">
        <i class="material-icons">keyboard_return</i> Regresar
        </a>
