
        <div class="team">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Nombre completo</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    @foreach ($patients as $patient)
                    <tbody>
                        <tr>

                            <td>{{$patient->username}}</td>
                            <td>{{$patient->fullname}}</td>
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

            </div>
        </div>
        <a href ="{{ url('/patient') }}"class="btn btn-success btn-round">
            <i class="material-icons">keyboard_return</i> Regresar
        </a>

    </div>
