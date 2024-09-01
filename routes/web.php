<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginUser;

Route::post('/ValidarUsuarioContrasena', [loginUser::class, 'loginUserAcces']);
Route::get('/usuarioactivo', [loginUser::class, 'usuarioactivo']);
Route::get('/logout', [loginUser::class, 'logout']);
Route::post('/token_activo', [loginUser::class, 'token_activo']);
Route::get('/InformacionUsuario', [loginUser::class, 'inormacionUsuario']);

Route::get('{any?}', function() {
    return view('application');
})->where('any', '.*');