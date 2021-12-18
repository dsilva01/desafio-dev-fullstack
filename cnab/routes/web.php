<?php

use App\Http\Controllers\CnabController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    route::get('/', ['as' => 'cnab.cadastrar', 'uses' => 'App\Http\Controllers\CnabController@cadastrar']);
    route::post('cnab/store', ['as' => 'cnab.store', 'uses' => 'App\Http\Controllers\CnabController@store']);

    route::get('/listar', ['as' => 'transacoes.listar', 'uses' => 'App\Http\Controllers\TransacoesController@listar']);
