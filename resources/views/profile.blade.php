<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MyWallet - Perfil</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/app.css")}}">
    <link rel="stylesheet" href="{{ asset("css/profile.css")}}">
  </head>
  <body>

    <div class="container card center bg-white">
      <h1 align="center" class="margem">Perfil</h1>
      <form class="form-group horizontal-center" action="{{route('profile.update', Auth::$user->id)}}" method="post">
        @csrf
        <div class="form-group col-sm-12">
          <label class="col-sm-2" for="name">Nome</label>
          <input class="col-sm-8 form-control" type="text" name="name" value="">
        </div>
        <div class="form-group col-sm-12">
          <label class="col-sm-2" for="surname">Sobrenome</label>
          <input class="col-sm-8 form-control" type="text" name="surname" value="">
        </div>
        <div class="form-group col-sm-12">
          <label class="col-sm-2" for="email">Email</label>
          <input class="col-sm-8 form-control" type="email" name="email" value="">
        </div>
        <div class="form-group col-sm-12">
          <label class="col-sm-2" for="address">Endereço</label>
          <input class="col-sm-8 form-control" type="text" name="address" value="">
        </div>
        <div class="form-group col-sm-12">
          <div class="col-sm-6 px-0">
            <label class="col-sm-2" for="city">Cidade</label>
            <input class="col-sm-8 form-control" type="text" name="city" value="">
          </div>
          <div class="col-sm-6 px-0">
            <label class="col-sm-2" for="state">Estado</label>
            <input class="col-sm-8 form-control" type="text" name="state" value="">
          </div>
        </div>
        <div class="form-group col-sm-12">
          <label class="col-sm-2" for="phone">Telefone</label>
          <input class="col-sm-8 form-control" type="text" name="phone" value="">
        </div>
        <div class="form-group col-sm-12">
          <label class="col-sm-3" for="income">Renda Bruta</label>
          <input class="col-sm-8 form-control income" type="text" name="income" value="">
        </div>

				<div class="col-sm-12 margem-salvar form-group-actions">
					<button type="submit" class="btn btn-primary" title="Salvar">Salvar</button>
				</div>

      </form>

    </div>


    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $(function() {
      $('.income').mask('#.##0,00', {reverse: true});
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/profile.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
