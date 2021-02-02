<?php

use Illuminate\Database\Seeder;
use App\Operacion;

class OperacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operacion::create([
            'operacion' => 'REGISTRAR',
        ]);
        Operacion::create([
            'operacion' => 'ELIMINAR',
        ]);
        Operacion::create([
            'operacion' => 'EDITAR',
        ]);
        Operacion::create([
            'operacion' => 'LOGIN',
        ]);
        Operacion::create([
            'operacion' => 'LOGOUT',
        ]);
    }
}
