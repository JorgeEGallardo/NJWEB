@extends('layouts.app')
@section('body-class','landing-page sidebar-collapse')
@section('title', 'Bienvenido a WellnessPal')
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
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Bienvenido  {{ Auth::user()->name }}</h2>
          <h5 class="description">-----</h5>
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="card-image">
                <a href="/">
                  <img class="img img-raised" id="card1" src="{{asset ('/img/logo.png')}}"  />
                </a>
              </div>
              <!-- <div class="icon icon-info">
                <i class="material-icons">image</i>
              </div> -->
              <h4 class="info-title">Administracion de pacientes</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
            <div class="card-image">
                <a href="/menus">
                  <img class="img img-raised" id="card1" src="{{asset ('/img/logo.png')}}"  />
                </a>
              </div>
            <!--   <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div> -->
              <h4 class="info-title">Administracion de Menus</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
            <div class="card-image">
                <a href="/">
                  <img class="img img-raised" id="card1" src="{{asset ('/img/logo.png')}}"  />
                </a>
              </div>
              <!-- <div class="icon icon-danger">
                <i class="material-icons">fingerprint</i>
              </div> -->
              <h4 class="info-title">Administracion de rutinas</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection