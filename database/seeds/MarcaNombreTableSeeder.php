<?php

use Illuminate\Database\Seeder;
use App\Marca;
use App\Nombre;

class MarcaNombreTableSeeder extends Seeder
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
                'marca' => 'NISSAN',
            ],
            [ 
                'marca' => 'TOYOTA',
            ],
            [ 
                'marca' => 'SUZUKI',
            ],
            [ 
                'marca' => 'HONDA',
            ],
        ];
        foreach($datas as $data){
            Marca::create($data);
        }

        $datas = [
            [ 
                'nombre' => 'ALTIMA',
                'id_marca' => 1,
            ],
            [ 
                'nombre' => 'QASHQAI',
                'id_marca' => 1,
            ],
            [ 
                'nombre' => 'COROLLA',
                'id_marca' => 2,
            ],
            [ 
                'nombre' => 'BALENO',
                'id_marca' => 3,
            ],
            [ 
                'nombre' => 'VITARA',
                'id_marca' => 3,
            ],
            [ 
                'nombre' => 'IGNIS',
                'id_marca' => 3,
            ],
            [ 
                'nombre' => 'PILOT',
                'id_marca' => 4,
            ],
            [ 
                'nombre' => 'CIVIC',
                'id_marca' => 4,
            ],
        ];
        foreach($datas as $data){
            Nombre::create($data);
        }
    }
}
