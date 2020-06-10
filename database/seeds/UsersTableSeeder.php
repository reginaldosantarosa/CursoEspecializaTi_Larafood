<?php

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

        User::create([
            'name'      => 'Carlos Ferreira',
            'email'     => 'puc@puc.com.br',
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'Reginaldo',
            'email'     => 'reginaldo_00@hotmail.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}
