<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
      .contagem{
          width:50px;
          height: 50px;
          background: #fdca01;
          border-radius: 50%;
          padding-top:12px ;
          padding-bottom:10px;
          padding-left:20px;
          font-weight: bolder;
      }
    </style>
  </head>
  <body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <div class="container">
        <br>
        <h4>Lista de usuários ativos </h4> <br>
        <a class="btn btn-success" href="{{url('CadastrarUsuario')}}">Cadastrar usuário</a><br><br>
        <p class="contagem">{{$countt}}</p>

        <br>
        <script type="text/javascript">

        function deleta(id)
        {
            var confirma = confirm("Deseja realmente excluir este usuário ? ");

            if(confirma){

              var rota = "{{url('/')}}";

            	window.location.href = rota+'/'+id+'';

            }else{

            }

        }
        </script>

        @if (session('sucesso'))
          <div class="alert alert-success">
              {{ session('sucesso') }}
          </div>
        @endif
        <br>
          <form class="" action="{{url('/')}}" method="post">
              <div class="row">
                  <div class="col-sm-10">
                    <input type="text" style="height:67px" id="pesquisa" name="pesquisa" value="" class="form-control" placeholder="Pesquise ...">
                  </div>
                  <div class="col-sm-2">
                      <button type="submit" id="buscar" style="margin-top:10px" class="btn btn-lg btn-warning" name="button">Buscar</button>
                  </div>
              </div>
          </form>
          <script type="text/javascript">
              $(function(){
                  $('#pesquisa').keyup(function(){
                    var pesquisa = $(this).val();
                    $.ajax({
                      url:'{{url('PesquisaUsuario')}}',
                      type:'POST',
                      data:{
                          pesquisa:pesquisa,
                          _token:'{{csrf_token()}}'
                      },
                      success:function(response){
                        console.log(response);
                        $('table tbody').html("");

                        response.map((value,index)=>{

                        var rota = "{{url('EditUser')}}/";

                        var id =  value.id;

                        var rotaid = rota + id;

                        $('table tbody').append('<tr><td>'+value.nome+'</td><td>'+value.email+'</td><td>'+value.telefone+'</td><td><a href='+rotaid+'>Editar</a></td><td><button type="button" onclick="deleta('+value.id+')" class="btn btn-danger">Tchau</button></td></tr>');
                        });
                      },
                      error:function(erro){
                      console.log(erro);
                      }
                    });
                  });
              });
          </script>
          <br><br>
        <table class="table">
            <thead>
              <th>Nome</th>
              <th>Email</th>
              <th>Telefone</th>
                <th>Editar</th>
                <th>Deletar</th>
            </thead>
            <tbody>
              @foreach($cadastrados as $usuario)
              <tr>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefone}}</td>
                <td><a href='{{url("EditUser/$usuario->id")}}'>Editar</a></td>
                <td> <button type="button" onclick='deleta({{$usuario->id}})' class="btn btn-danger">Tchau</button></td>
              </tr>
              @endforeach
            </tbody>
        </table>

      </div>


  </body>
</html>
