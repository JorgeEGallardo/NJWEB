@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Pacientes')
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

    <input type="text" class="m-5" id="str" onchange="search()" placeholder="Buscar">
    <div id="tabla">
        <div class="section text-center">
            <h2 class="title">Catálogo </h2>
            <div class="team" style="margin-left:5%;margin-right:5%">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Menu</th>
                                <th>Receta</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($catalog as $menu)
                        <tbody>
                            <tr>
                                <td>{{$menu->description}}</td>

                                <td style="width:30%; height:25%"><textarea style="margin:0px; padding:0px; height:7em!important;width:100%">{{$menu->menu}}</textarea>
                                </td>
                                <td style="width:30%; height:25%"><textarea style="margin:0px; padding:0px; height:7em!important;width:100%">{{$menu->recipes}}</textarea>
                                </td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/menus/patient/'.$menu->id).'85'.$name}}">
                                        @csrf
                                        {{ method_field('DELETE')}}
                                        <a href="{{ url('/menus/massiveAsign/'.$menu->id.'85'.$id) }}" rel="tooltip" title="Elegir este menú" class="btn btn-success">
                                            <i class="material-icons">add_box</i>
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


                    {{ $catalog->links() }}


                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('/menus') }}" class="btn btn-success btn-round">
        <i class="material-icons">keyboard_return</i> Regresar
    </a>
</div>

<script>
    function search() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '{{url(' / menus / getCatalog ')}}',
            data: {
                "search": document.getElementById("str").value,
                "patient": {
                    {
                        $id
                    }
                }
            },
            success: function(Response) {
                document.getElementById("tabla").innerHTML = Response;
            }
        });
    }
</script>
@endsection
