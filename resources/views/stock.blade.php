<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simplificando - Investimentos</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/app.css")}}">
    <link rel="stylesheet" href="{{ asset("css/expense.css")}}">
  </head>
  <body>
    @include('inc.messages')
    @include('inc.menu')

    <div class="container card center bg-white">
      <div class="col-sm-12">
        <div class="col-sm-6">
          <h3 align="left" class="margem">Adicionar Investimento</h3>
        </div>
        <div class="col-sm-6">
          <a href="{{ route('investment') }}"><button class="btn btn-danger direita">Voltar</button></a>
        </div>
      </div>
        <form class="form-group horizontal-center" action="{{route('stock.store')}}" method="post">
          @csrf
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="sigla">Sigla</label>
            <input class="col-sm-8 form-control" type="text" name="sigla" value="">
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="name">Nome</label>
            <input class="col-sm-8 form-control" type="text" name="name" value="">
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="quantity">Quantidade</label>
            <input class="col-sm-8 form-control" type="number" name="quantity" value="">
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-3" for="total_value">Valor total do lote</label>
            <input class="money col-sm-8 form-control" type="text" name="total_value" value="">
          </div>

  				<div class="col-sm-12 margem-salvar form-group-actions">
  					<button type="submit" class="center btn btn-primary" title="Salvar">Salvar</button>
  				</div>

        </form>

      </table>
    </div>

    <script src="https://kit.fontawesome.com/195f982978.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/app.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
