<?php

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plano::create([
            'nome' => 'Businers',
            'url' => 'businers',
            'preco' => 499.99,
            'descricao' => 'Plano Empresarial',
        ]);
    }
}
