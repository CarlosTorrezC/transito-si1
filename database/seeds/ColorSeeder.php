<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [ 
                'nombre' => 'AZUL',
                
            ],
            [
                'nombre' => 'ROJO',
                
            ],
            [
                'nombre' => 'VERDE',
                
            ],
            [
                'nombre' => 'NEGRO',
                
            ],
            [
                'nombre' => 'BLANCO',
                
            ],
            [
                'nombre' => 'PLATA',
                
            ],
            [
                'nombre' => 'GRIS',
               
            ],
            [
                'nombre' => 'CELESTE',
               
            ],
            [
                'nombre' => 'NARANJA',
                
            ],
            [
                'nombre' => 'NEGRO',
                
            ],
        ];
        foreach($datas as $data){
            Color::create($data);
        }
    }
}
