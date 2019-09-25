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
                <a href="/">
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
<!--     <div class="section text-center">
      <h2 class="title">Here is our team</h2>
      <div class="team">
        <div class="row">
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="../assets/img/faces/avatar.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">Gigi Hadid
                  <br>
                  <small class="card-description text-muted">Model</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                    <a href="#">links</a> for people to be able to follow them outside the site.</p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="../assets/img/faces/christian.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">Christian Louboutin
                  <br>
                  <small class="card-description text-muted">Designer</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                    <a href="#">links</a> for people to be able to follow them outside the site.</p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="../assets/img/faces/kendall.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">Kendall Jenner
                  <br>
                  <small class="card-description text-muted">Model</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                    <a href="#">links</a> for people to be able to follow them outside the site.</p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Work with us</h2>
          <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Name</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Email</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> -->
  </div>
</div>
<footer class="footer footer-default">
  <div class="container">
    <!--<nav class="float-left">
      <ul>
        <li>
          <a href="/">
            About Us
          </a>
        </li>
        <li>
          <a href="/">
            Blog
          </a>
        </li>
        <li>
          <a href="/">
            Licenses
          </a>
        </li>
      </ul>
      </nav> -->
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a target="_blank">Web developers Adara's team</a> for a better work experience.
    </div>
  </div>
</footer>
@endsection