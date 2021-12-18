<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Transacao;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class CnabController extends BaseController
{
  public function cadastrar()
  {
    return view('upload.index');
  }


  public function store(Request $request)
  {
    if (!$request->hasfile('ficheiro')) {
      return redirect()->back();
    }

    $data = File::get($request->file('ficheiro'));
    $data = explode("\n", $data);

    foreach($data as $item) {
      if($item) {

        $tipo = substr($item, 0, 1);
        $dat = substr($item, 1, 8);
        $valor = substr($item, 9, 10);
        $valor /= 100;
        $bi = substr($item, 19, 14);
        $cartao = substr($item, 33, 12);
        $hora = substr($item, 45, 6);
        $dono = substr($item, 51, 14);
        $loja = substr($item, 65, 19);
  
        $loja_selecionada = Loja::where('nome', $loja)->get()->first();
        if(!isset($loja_selecionada->id)) {
          $loja_selecionada = Loja::create([
            'nome' => $loja
          ]);
        }
  
        $transacao_selecionada = Transacao::where([['loja', $loja_selecionada->id], ['data', $dat], ['hora', $hora]])->get()->first();
        if(!isset($transacao_selecionada->id)) {
          Transacao::create([
            'tipo' => $tipo,
            'data' => $dat,
            'valor' => $valor,
            'bi' => $bi,
            'cartao' => $cartao,
            'hora' => $hora,
            'dono' => $dono,
            'loja' => $loja_selecionada->id,
          ]);
        }
      }
    }
    return redirect(route('transacoes.listar'));
  }
}
