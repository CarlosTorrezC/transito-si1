<?php

use Illuminate\Database\Seeder;
use App\Titulo;
use App\Capitulo;

class CapituloTableSeeder extends Seeder
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
                'nombre' => 'DE LAS FALTAS Y SANCIONES',
            ],
        ];
        foreach($datas as $data){
            Titulo::create($data);
        }

        $datas = [
            [ 
                'nombre' => 'DE LAS INFRACCIONES Y SANCIONES',      
                'id_titulo' => '1',  
            ],
            [ 
                'nombre' => 'DE LAS NORMAS DE LA APLICACION DE LAS SANCIONES',
                'id_titulo' => '1',
            ],
        ];
        foreach($datas as $data){
            Capitulo::create($data);
        }
        
    }
}
