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
          <a href="{{ route('extra') }}"><button class="btn btn-primary direita">Adicionar ganho</button></a>
          <a href="{{ route('expense') }}"><button class="btn btn-primary direita">Adicionar despesa</button></a>
        </div>
      <table class="table table-sm-12 table-bordered lista">
        <thead>
          <tr>
            <th width="50px" scope="col">#</th>
            <th scope="col">Identificador</th>
            <th scope="col">Vencimento</th>
            <th scope="col">Valor</th>
            <th width="100px" scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @if(Auth::user->income != null)
          <tr style="background-color: #ccffcc">
            <th scope="row"><input type="checkbox"></th>
            <td>Renda Mensal</td>
            <td>--/--/----</td>
            <td><i class="fa fa-plus-circle" aria-hidden="true"></i> R$ {{ Auth::user()->income }}</td>
            <td></td>
          </tr>
          @endif
          @foreach($moviments as $moviment)
          @if($moviment instanceof App\Models\Expense)
          <tr style="background-color: #ffcccc">
            <th scope="row"><input type="checkbox"></th>
            <td>{{ $moviment->name }}</td>
            <td>{{ $moviment->present->vcto }}</td>
            <td><i class="fa fa-minus-circle" aria-hidden="true"></i> R$ {{ number_format($moviment->value, 2, ',', '.') }}</td>
            <td><a href="{{ route('expense.delete', $moviment->id) }}" class="btn btn-danger">Excluir</a> <!-- <button class="btn btn-info">Pagar</button> --> </td>
          </tr>
          @endif
          @if($moviment instanceof App\Models\Extra)
          <tr style="background-color: #ccffcc">
            <th scope="row"><input type="checkbox"></th>
            <td>{{ $moviment->name }}</td>
            <td>{{ $moviment->present->vcto }}</td>
            <td><i class="fa fa-plus-circle" aria-hidden="true"></i> R$ {{ number_format($moviment->value, 2, ',', '.') }}</td>
            <td><a href="{{ route('extra.delete', $moviment->id) }}" class="btn btn-danger">Excluir</a> <!-- <button class="btn btn-info">Pagar</button> --> </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
      <button class="btn btn-info margem">Pagar contas marcadas</button>
      <span class="direita size"><strong>Saldo:</strong>R$ {{ number_format($saldo, 2, ',', '.') }}</span>
    </div>
    <script src="https://kit.fontawesome.com/195f982978.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset("js/app.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
