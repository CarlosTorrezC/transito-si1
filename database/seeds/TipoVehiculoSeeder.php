<?php

use Illuminate\Database\Seeder;
use App\TipoVehiculo;

class TipoVehiculoSeeder extends Seeder
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
                'descripcion' => 'AUTO',
             
            ],
            [ 
                'descripcion' => 'CAMIONETA',
               
            ],
            [ 
                'descripcion' => 'VAGONETA',
                
            ],
            [ 
                'descripcion' => 'MINIVAN',
             
            ],
            [ 
                'descripcion' => 'COMPACTO',
                
            ],
            [ 
                'descripcion' => 'HATCHBACK',
               
            ],
            [ 
                'descripcion' => 'CAMION',
                
            ],
            [ 
                'descripcion' => 'SEDAN',
                
            ],
        ];
        foreach($datas as $data){
            TipoVehiculo::create($data);
        }
    }
}
