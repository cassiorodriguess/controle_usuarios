<?php

Route::get('/','usuarioController@index');

Route::get('/ListaUsuarios', 'usuarioController@index');

Route::get('/CadastrarUsuario', 'usuarioController@retornaUsuarioCadastro');

Route::get('/EditUser/{id}','usuarioController@edit');

Route::post('/CadastroUsuarios','usuarioController@store');

Route::post('/AtualizaUsuario/{id}','usuarioController@update');

Route::get('/DeleteUser/{id}','usuarioController@delete');

Route::post('/PesquisaUsuario','Apis\ApisrcController@pesquisaUserSrc');
