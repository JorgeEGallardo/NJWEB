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
        <div style="float:right; margin-top:3%;margin-right:4%!important">
                <form action="{{ route('uploadfile') }}" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <input type="hidden" name="patient" value={{$id}}>
                    <input type="file" name="file" id="">
                    <span class="help-block text-danger">{{$errors->first('file')}}</span>
                    <div class="form-group">
                    <input type="hidden" value="Paciente {{$name}}" name="title" id="caption" class="form-control"></textarea>
                        <span class="help-block text-danger">{{$errors->first('title')}}</span>

                    </div>
                    <button class="btn btn-primary">Subir una nueva imagen</button>
                </form>
                <form action="{{ route('uploaddoc') }}" enctype="multipart/form-data"
                method="post">
                @csrf
                <input type="hidden" name="patient" value={{$id}}>
                <input type="file" name="file" id="">
                <span class="help-block text-danger">{{$errors->first('file')}}</span>
                <div class="form-group">
                <input type="hidden" value="Paciente {{$name}}" name="title" id="caption" class="form-control"></textarea>
                    <span class="help-block text-danger">{{$errors->first('title')}}</span>

                </div>
                <button class="btn btn-primary">Subir un documento nuevo</button>
            </form>
        </div>
    <div class="container">
        <div class="section text-center">

            <h2 class="title">Imagenes de {{$name}} </h2>

            <div class="team">
                <div class="row">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                @if (session('success'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session('success')}}
                                </div>
                                @endif
                            </div>
                        </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mdb-lightbox">
                                            @foreach ($images as $image)
                                            <figure class="col-md-4" style="float:left">
                                            <a href='{{ url("deleteimg/$image->id")}}'' rel="tooltip" title="Ver" class="btn btn-danger" style="float:right;margin-bottom:-7%">
                                                        x
                                                    </a>
                                                <a target="_blank" href='{{$domain.$image->path}}'
                                                    data-size="1600x1067">
                                                    <img alt="picture" src='{{$domain.$image->path}}' class="img-fluid">
                                                </a>
                                            </figure>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>


                            </div>



                            <script>

                            </script>

                            @endsection
