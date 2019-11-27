<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MyWallet</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/login.css")}}">
  </head>
  <body>
    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-3 center mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registrar-se</h5>
            <form class="form-signin" action="{{route('register')}}" method="post">
              @csrf
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nome" required autofocus>
                <label for="name">Nome</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                <label for="email">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                <label for="password">Senha</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password_confirm" class="form-control" placeholder="Confirmação de Senha" required>
                <label for="password_confirm">Confirmação de Senha</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
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
