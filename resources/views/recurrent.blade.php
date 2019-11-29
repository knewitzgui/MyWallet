<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simplificando - Gerenciador</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/app.css")}}">
    <link rel="stylesheet" href="{{ asset("css/manager.css")}}">
  </head>
  <body>
    @include('inc.messages')
    @include('inc.menu')

    <div class="card center bg-white">
        <div class="col-sm-6">
          <h1 align="left" class="margem">Adicionar despesa</h1>
        </div>
        <div class="col-sm-6">
          <a href="{{ route('manager') }}"><button class="btn btn-danger direita">Voltar</button></a>
        </div>
        <form class="form-group horizontal-center" action="{{route('recurrent.store')}}" method="post">
          @csrf
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="name">Descrição</label>
            <input class="col-sm-8 form-control" type="text" name="name" value="">
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="vcto">Vencimento</label>
            <input class="col-sm-8 form-control" type="text" name="vcto" value="">
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="value">Valor</label>
            <input class="col-sm-8 form-control" type="text" name="value" value="">
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-2" for="recurrent">Recorrência</label>
            <input class="col-sm-8 form-control" type="text" name="recurrent" value="">
          </div>

  				<div class="col-sm-12 margem-salvar form-group-actions">
  					<button type="submit" class="btn btn-primary" title="Salvar">Salvar</button>
  				</div>

        </form>

      </table>
      <button class="btn btn-info margem">Pagar contas marcadas</button>
      <span class="direita size"><strong>Saldo:</strong> - R$ 819,70</span>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/app.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
