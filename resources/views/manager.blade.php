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
    <div class="container card center bg-white">
        <div class="col-sm-3">
          <h1 align="left" class="margem">Gerenciador</h1>
        </div>
        <div class="col-sm-9">
          <a href="{{ route('extra') }}"><button class="btn btn-primary direita">Adicionar renda extra</button></a>
          <a href="{{ route('recurrent') }}"><button class="btn btn-primary direita">Adicionar despesa recorrente</button></a>
          <a href="{{ route('expense') }}"><button class="btn btn-primary direita">Adicionar despesa</button></a>
        </div>
      <table class="table table-sm-12 table-bordered lista">
        <thead>
          <tr>
            <th width="50px" scope="col">#</th>
            <th scope="col">Identificador</th>
            <th scope="col">Vencimento</th>
            <th scope="col">Valor</th>
            <th width="200px" scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($expenses as $expense)
          <tr>
            <th scope="row"><input type="checkbox"></th>
            <td>{{ $expense->name }}</td>
            <td>{{ $expense->present->vcto }}</td>
            <td>R$ {{ $expense->value }}</td>
            <td><button class="btn btn-danger">Excluir</button> <button class="btn btn-info">Pagar</button></td>
          </tr>
          @endforeach
          <tr>
            <th scope="row"><input type="checkbox"></th>
            <td>Luz - RGE</td>
            <td>12/12/2019</td>
            <td>R$ 319,80</td>
            <td><button class="btn btn-danger">Excluir</button> <button class="btn btn-info">Pagar</button></td>
          </tr>
        </tbody>
      </table>
      <button class="btn btn-info margem">Pagar contas marcadas</button>
      <span class="direita size"><strong>Saldo:</strong> - R$ 819,70</span>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/app.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
