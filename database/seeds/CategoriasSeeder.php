<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasSeeder extends Seeder
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
                'categoria' => 'P',
                'nombre' => 'Particular P',
                'descripcion' => 'Esta licencia está especialmente determinada, para personas que puedan conducir automóviles, camionetas, vagonetas de uso particular, con capacidad de hasta 7 ocupantes, incluyendo al conductor',
   
            ],
            [
                'categoria' => 'A',
                'nombre' => 'Profesional A',
                'descripcion' => 'Esta licencia está permitido para personas conducir vehículos de la categoría P. Vehículos como automóviles, vagonetas, camionetas, jeeps y minibuses, con 10 pasajeros. Carga hasta de 2 1/2 toneladas',

            ],
            [
                'categoria' => 'B',
                'nombre' => 'Profesional B',
                'descripcion' => 'Esta licencia está permitido para personas conducir vehículos de las categorías P y Profesional A. Vehículos como minibuses, micros, escolar, turístico y de emergencia, con 25 pasajeros. Carga hasta 6 toneladas',

            ],
            [
                'categoria' => 'C',
                'nombre' => 'Profesional C',
                'descripcion' => 'Licencia permite a personas conducir vehículos de las categorías P y Profesionales A y B. Vehículos como micros, colectivos, buses, camiones medianos, de alto tonelaje, con y sin acople, volquetas y cisternas, con 25 pasajeros. Carga superior 6 toneladas',
            ],
        ];
        foreach($datas as $data){
            Categoria::create($data);
        }
    }
}
