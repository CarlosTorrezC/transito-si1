<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'codigo_oficial' => 'fercho12345',
            'ci' => '8341182',
            'nombres' => 'FERNANDO',
            'apellidos' => 'AMELLER',
            'sexo' => 'M',
            'nacionalidad' => 'BOLIVIANA',
            'fecha_nacimiento' => '1997-03-12',
            'direccion' => 'URUBO',
            'email' => 'fercho199758@gmail.com',
            'estado_oficial' => false,
            'grupo_sanguineo' => 'ORH+'
        ]);



        User::create([
            'username' => 'admin',
            'password' => bcrypt(123456789),
            'codigo_oficial' => 'fercho12345',
            'remember_token' =>  Str::random(60),
            'email' => 'fercho199758@gmail.com',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}
