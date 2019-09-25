@extends('layouts.app')
@section('body-class','landing-page sidebar-collapse')
@section('title', 'Recetas')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/cover-index.png')">
  
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Menus</h2>
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