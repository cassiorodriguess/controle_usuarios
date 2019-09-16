<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
     'id','nome','email','telefone','senha'
    ];

    public $rules = [
    'nome'=>'required',
    'email'=>'required|unique:usuarios'
   ];

}
