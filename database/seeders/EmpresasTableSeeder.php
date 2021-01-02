<?php
namespace Database\Seeders;
use App\Models\Plano;
use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plano = Plano::first();

        $plano->empresas()->create([
            'cnpj' => '23882706000120',
            'nome' => 'EspecializaTi',
            'url' => 'especializati',
            'email' => 'carlos@especializati.com.br',
        ]);
    }
}
