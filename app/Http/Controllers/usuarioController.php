<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelos\Usuario;

class usuarioController extends Controller
{
    private $usuario;

    public function __construct(Usuario $usuario){

    $this->usuario = $usuario;

    }

    public function index()
    {
        $cadastrados = $this->usuario->all();

        $countt = $this->usuario->count();

        return view('usuarios.ListaUsuarios',compact('cadastrados','countt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DataForm = $request->all();

        $DataForm['senha'] = bcrypt($DataForm['senha']);

        $this->validate($request , $this->usuario->rules);

        $insere = $this->usuario->create($DataForm);

        if($insere){

          return redirect('CadastrarUsuario')->with('sucesso', 'Cadastrado com sucesso!');

        }else{

          return redirect('/')->with('error', 'Error ! ');

        }


    }

    public function retornaUsuarioCadastro(){

    return view('usuarios.Cadastro');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $useredit = $this->usuario
        ->find($id);

        return view ('usuarios.Cadastro',compact('useredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $DataForm = $request->all();
      $newupdate = $this->usuario->find($id);
      $update = $newupdate->update($DataForm);

      if($update){

        return redirect('/CadastrarUsuario')->with('atual','Atualizado com sucesso !');

      }else{

        return redirect('/CadastrarUsuario')->with('erro',' Não pode ser atualizado !');

      }
    }

    public function delete($id){

     $newdelete = $this->usuario->find($id);

     $deleted =  $newdelete->delete();

     if($deleted){
        return redirect('ListaUsuarios')->with('sucesso', 'Deletado com sucesso ! ');
     }else{
         return redirect('ListaUsuarios')->with('erro', 'Erro !');
     }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
