<?php

use App\Models\Empresa;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $empresa = Empresa::first();

        $empresa->users()->create([
            'name' => 'Reginaldo',
            'email' => 'reginaldo_00@hotmail.com',
            'password' => bcrypt('123456'),
        ]);


    }
}
