<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_transacao extends Model
{
    use HasFactory;
    protected $table= "tipo_transacoes";
    protected $fillable = [
        'id',
        'tipo', 
        'descricao',
        'natureza',
        'sinal'
    ];
}
