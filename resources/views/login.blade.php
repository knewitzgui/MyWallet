<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simplificando</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/login.css")}}">
  </head>
  <body>
    @include('inc.messages')

    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-3 center mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" action="{{route('login')}}" method="post">
              @csrf
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
                <label for="inputEmail">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
                <label for="inputPassword">Senha</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
              <a href="{{route('user.register')}}" align="right"><h6 class="title margem">Registrar-se</h6></a>
              <hr class="my-4">
              <a href="{{route('social.google.redirect')}}"><button class="btn btn-lg btn-google btn-block text-uppercase" type="button"><i class="fab fa-google mr-2"></i> Login com Google</button></a>
              <a href="{{route('social.facebook.redirect')}}"><button class="btn btn-lg btn-facebook btn-block text-uppercase" type="button"><i class="fab fa-facebook-f mr-2"></i> Login com Facebook</button></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/app.js")}}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
