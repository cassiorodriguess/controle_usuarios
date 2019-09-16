<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\modelos\Usuario;

class ApisrcController extends Controller
{
    private $usuario;

    public function __construct(Usuario $usuario){

    $this->usuario = $usuario;

    }

    public function pesquisaUserSrc(Request $request){

    $parametros = $request->pesquisa;

    $users = $this->usuario
    ->where('nome','LIKE','%'.$parametros.'%')
    ->get();

    return response()->json($users);

    }



}
