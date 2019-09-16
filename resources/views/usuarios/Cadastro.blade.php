<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <div class="container">

        <br><br>

          @if (session('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
          @endif

          @if (session('atual'))
            <div class="alert alert-warning">
                {{ session('atual') }}
            </div>
          @endif

          <!-- /resources/views/post/create.blade.php -->

            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
           @endif

<!-- Create Post Form -->

          @if(!isset($useredit))
          @php
            $nome   = "" ;
            $email  = "" ;
            $telefone ="" ;
          @endphp
          <br>
          <a class="btn btn-lg btn-warning" href="{{url('/ListaUsuarios')}}">Voltar a lista</a>

          <form class="form-horizontal col-sm-5 offset-4" action="{{url('/CadastroUsuarios')}}" method="post">
          <h2 class="">Cadastre-se</h2>
          @else
            @php
              $nome  = $useredit->nome;
              $email = $useredit->email;
              $telefone = $useredit->telefone;
            @endphp
          <form class="form-horizontal col-sm-5 offset-4" action='{{url("/AtualizaUsuario/$useredit->id")}}' method="post">
          <h2 class="">Atualize seu cadastro</h2>
          @endif
          {!! csrf_field() !!}
          <br>
          <div class="form-group">
              <input type="text"  class="form-control" placeholder="Seu nome" name="nome" value="{{$nome}}">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" placeholder="seuemail@.com.br"name="email" value="{{$email}}">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" placeholder="(ddd) + telefone" name="telefone" value="{{$telefone}}">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" name="senha" placeholder="*******" value="">
          </div>

          @if(isset($useredit))

          <div class="form-group">
              <input type="submit" class="btn btn-lg btn-success" value="Atualizar">
          </div>

          @else

          <div class="form-group">
              <input type="submit" class="btn btn-lg btn-success" value="Cadastrar">
          </div>

          @endif

        </form>

      </div>


  </body>
</html>
