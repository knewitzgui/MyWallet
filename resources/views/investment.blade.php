<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simplificando - Investimentos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/app.css")}}">
    <link rel="stylesheet" href="{{ asset("css/manager.css")}}">
  </head>
  <body>
    @include('inc.messages')
    @include('inc.menu')
    <div class="container card center bg-white">
        <div class="col-sm-3">
          <h1 align="left" class="margem">Investimentos</h1>
        </div>
        <div class="col-sm-9">
          <a href="{{ route('stock') }}"><button class="btn btn-primary direita">Adicionar Ação</button></a>
        </div>
      <table class="table table-sm-12 table-bordered lista">
        <thead>
          <tr>
            <th scope="col">Sigla</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor total do lote</th>
            <th width="100px" scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($stocks as $stock)
          <tr>
            <td>{{ $stock->sigla }}</td>
            <td>{{ $stock->name }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>R$ {{ $stock->total_value }}</td>
            <td><a href="{{ route('stock.delete', $stock->id) }}" class="btn btn-danger">Excluir</a> <!-- <button class="btn btn-info">Pagar</button> --> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/app.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
