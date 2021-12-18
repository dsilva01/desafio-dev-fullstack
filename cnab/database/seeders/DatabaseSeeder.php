<?php

namespace Database\Seeders;

use App\Models\Tipo_transacao;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if(Tipo_transacao::count() < 1) {
            Tipo_transacao::create([
                'tipo' => '1',
                'descricao' => 'Débito',
                'natureza' => 'Entrada',
                'sinal' => '+',
            ]);

            Tipo_transacao::create([
                'tipo' => '2',
                'descricao' => 'Boleto',
                'natureza' => 'Saida',
                'sinal' => '-',
            ]);

            Tipo_transacao::create([
                'tipo' => '3',
                'descricao' => 'Financiamento',
                'natureza' => 'Saida',
                'sinal' => '-',
            ]);

            Tipo_transacao::create([
                'tipo' => '4',
                'descricao' => 'Crédito',
                'natureza' => 'Entrada',
                'sinal' => '+',
            ]);
            Tipo_transacao::create([
                'tipo' => '5',
                'descricao' => 'Recebimento Empréstimo',
                'natureza' => 'Entrada',
                'sinal' => '+',
            ]);
            Tipo_transacao::create([
                'tipo' => '6',
                'descricao' => 'Vendas',
                'natureza' => 'Entrada',
                'sinal' => '+',
            ]);
            Tipo_transacao::create([
                'tipo' => '7',
                'descricao' => 'Recebimento TED',
                'natureza' => 'Entrada',
                'sinal' => '+',
            ]);
            Tipo_transacao::create([
                'tipo' => '8',
                'descricao' => 'Recebimento DOC',
                'natureza' => 'Entrada',
                'sinal' => '+',
            ]);
            Tipo_transacao::create([
                'tipo' => '9',
                'descricao' => 'Aluguel',
                'natureza' => 'Saida',
                'sinal' => '-',
            ]);
        }
    }
}
