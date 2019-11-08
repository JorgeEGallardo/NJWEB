@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('title', 'Documentos')
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

    <h2 class="title">Archivos de {{$name}} </h2>
        <div class="team">
            <div class="row">
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
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="mdb-lightbox">
                    @foreach ($images as $image)
                    <figure class="col-md-4" style="float:left">
                        <a href='{{ url("deleteimg/$image->id")}}'' rel="tooltip" title="Eliminar" class="btn btn-danger" style="float:right;margin-bottom:-7%">
                                        x
                                    </a>
                                <a target="_blank" href=' {{$domain.$image->path}}' data-size="1600x1067">
                            <img alt="picture" src='{{$domain.$image->path}}' class="img-fluid">
                        </a>
                    </figure>
                    @endforeach
                </div>
            </div>
        </div>
        
        <h2>Documentos</h2>
        <div>
            @foreach ($documents as $document)
                <div class="card" style="width:30%;height:100%; margin:5%; float:left">
                    <a href='{{ url("deletedoc/$document->id")}}'' rel="tooltip" title="Eliminar" class="btn btn-danger" style="float:right; width:10%;margin-bottom:-7%;margin-left:80%">
                        x
                    </a>
                    <img class="card-img-top" src="{{url('img/document.png')}}" alt="Card image" style="width:80%; margin:10%   ">
                    <div class="card-body">
                        <h4 class="card-title">{{$document->title}}</h4>
                        <p class="card-text">Tamaño: {{$document->size}}<br> Creado el: {{$document->created_at}}</p>
                        <a href="{{$domain.$document->path}}" class="btn btn-primary stretched-link">Descargar</a>
                    </div>
                </div>
            @endforeach
        </div>

            <div class="container"> 
                <form action="{{ route('uploadfile') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="patient" value={{$id}}>
                    <input type="file" name="file" id="" class="form-control inputFileVisible">
                    <span class="help-block text-danger">{{$errors->first('file')}}</span>
                    <div class="form-group form-file-upload form-file-multiple">
                        <div class="input-group">
                            <input type="hidden" value="Paciente {{$name}}" name="title" id="caption" class="form-control"></textarea>
                            <span class="help-block text-danger">{{$errors->first('title')}}</span>
                        </div>
                        

                    </div>
                    <button class="btn btn-primary">Subir una nueva imagen</button>
                </form>

                <form action="{{ route('uploaddoc') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="patient" value={{$id}}>
                    <input type="file" name="file" id="" class="form-control inputFileVisible">
                    <span class="help-block text-danger">{{$errors->first('file')}}</span>
                    <div class="form-group form-file-upload form-file-multiple">
                        <div class="input-grup">
                            <input textarea name="title" id="caption" class="form-control" placeholder="Titulo del documento" required></textarea>
                            <span class="help-block text-danger">{{$errors->first('title')}}</span>
                        </div>
                    </div>
                    <button class="btn btn-primary">Subir un documento nuevo</button>
                </form>

    </div>
  </div>
  <a href ="{{ url('/patient') }}"class="btn btn-success btn-round">
      <i class="material-icons">keyboard_return</i> Regresar
    </a>
</div>
@endsection
