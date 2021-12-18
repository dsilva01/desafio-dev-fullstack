<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacoesController extends Controller
{
    public function listar()
  {
      $dados['transacoes'] = Transacao::
      join('lojas', 'transacoes.loja', 'lojas.id')
      ->join('tipo_transacoes', 'transacoes.tipo', 'tipo_transacoes.tipo')
      ->select('transacoes.*', 'lojas.nome as loja', 'tipo_transacoes.descricao as tipo', 'tipo_transacoes.sinal')
      ->get();
      $dados['lojas'] = Loja::all();
      $dados['url'] = url('/');
    return view('operacoes.index', $dados);
  }
}
