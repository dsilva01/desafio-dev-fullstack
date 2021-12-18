<?php

namespace App\Http\Controllers\Api;

use App\Models\Loja;
use App\Models\Transacao;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TransacoesController extends BaseController
{

    public function listar(Request $request) {
      $loja_id = "";
      $loja_id = $request->query('loja_id');
      $loja = Loja::find($loja_id);
      // $loja = Loja::where('id', $loja_id)->get()->first();

      // dd($loja);

      $transacoes = Transacao::
      join('lojas', 'transacoes.loja', 'lojas.id')
      ->join('tipo_transacoes', 'transacoes.tipo', 'tipo_transacoes.tipo')
      ->select('transacoes.*', 'lojas.nome as loja', 'tipo_transacoes.descricao as tipo', 'tipo_transacoes.sinal')
      ->where('loja', $loja_id)->get();

      $total = 0;

      foreach ($transacoes as $item) {
        if($item->sinal == '+') {
          $total += $item->valor;
        }else {
          $total -= $item->valor;
        }
      }
      if(count($transacoes) < 1) {
        $total = "";
        $loja  = (Object) array( "nome" => "TODAS AS TRANSAÇÕES");
        $transacoes = Transacao::
      join('lojas', 'transacoes.loja', 'lojas.id')
      ->join('tipo_transacoes', 'transacoes.tipo', 'tipo_transacoes.tipo')
      ->select('transacoes.*', 'lojas.nome as loja', 'tipo_transacoes.descricao as tipo', 'tipo_transacoes.sinal')
      ->get();
      }
      // dd($total);
      return [
        "transacoes" => $transacoes, 
        "total" => $total,
        "loja" => $loja,
      ];

    // $data = File::get($request->file('ficheiro'));
    // $data = explode("\n", $data);
    // dd($request);
    // return 1;
   
    }
}
