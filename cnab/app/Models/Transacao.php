<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;
    protected $table= "transacoes";
    protected $fillable = [
        'id',
        'tipo', 
        'data',
        'valor',
        'bi',
        'cartao',
        'hora',
        'dono',
        'loja',
    ];
}
