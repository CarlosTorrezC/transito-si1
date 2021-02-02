<?php

use Illuminate\Database\Seeder;
use App\Infraccion;

class InfraccionSeeder extends Seeder
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
                'descripcion' => 'POR CIRCULAR CON UN VEHICULO SIN PLACA',
                'monto' => '100',    
                'id_capitulo' => '1',       
            ],
            [ 
                'descripcion' => 'POR EXCESO EN EL TRANSPORTE DE PASAJEROS O CARGA',
                'monto' => '200',      
                'id_capitulo' => '1',          
            ],
            [ 
                'descripcion' => 'POR CIRCULAR CON EXCESO DE VELOCIDAD',
                'monto' => '200',    
                'id_capitulo' => '1',            
            ],
            [ 
                'descripcion' => 'POR ENCANDILARES LOS CRUCES',
                'monto' => '500',     
                'id_capitulo' => '1',           
            ],
            [ 
                'descripcion' => 'POR CIRCULAR CONTRA RUTA SEÑALIZADA',
                'monto' => '100',       
                'id_capitulo' => '1',         
            ],
            [ 
                'descripcion' => 'POR ESTACIONAR O DETENER EL VEHICULO EN LA CARRETERA EN FORMA QUE HAGA PELIGROSO',
                'monto' => '400',    
                'id_capitulo' => '1',            
            ],
            [ 
                'descripcion' => 'POR OMITIR LAS SEÑALES REGLAMENTARIAS EN EL CASO DE TRANSPORTE DE CARGA PELIGROSAS',
                'monto' => '200',   
                'id_capitulo' => '1',             
            ],
            [ 
                'descripcion' => 'POR LLEVAR PASAJEROS O PERMITIRLOS CUANDO SE TRANSPORTE CARGAS PELIGROSAS',
                'monto' => '400',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR VIAJAR SIN EQUIPO, HERRAMIENTAS, SEÑALES DE EMERGENCIAS E IMPLEMENTO DE AUXILIO',
                'monto' => '100',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR UTILIZAR EL VEHICULO EN USO DISTINTO AL QUE SE HALLA DESTINADO',
                'monto' => '50',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR NEGARSE A EXHIBIR EL BREVET, LICENCIA O AUTORIZACION DE CONDUCTOR A LA AUTORIDAD DE TRANSITO',
                'monto' => '50',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR NO OBSERVAR LAS SEÑALES DE TRANSITO',
                'monto' => '50',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR EFECTUAR MANIOBRA ZIGZAG',
                'monto' => '50',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR CIRCULAR POR UNA VIA DE TRANSITO SUSPENDIDO',
                'monto' => '30',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR ESTACIONAR INCORRECTAMENTE EN VIAS URBANAS',
                'monto' => '20',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR NO CONSERVAR SU DERECHA AL CONDUCIR UN VEHICULO',
                'monto' => '20',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR LLEVAR PASAJEROS COMO CONDICION PARA PRESTARLES EL SERVICIO',
                'monto' => '30',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR ENTREGAR AL CONDUCTOR SU LICENCIA O BREVET EN PRENDA',
                'monto' => '50',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'POR CIRCULAR SIN LIMPIABRISAS',
                'monto' => '20',  
                'id_capitulo' => '1',              
            ],
            [ 
                'descripcion' => 'EN CASO DE QUE EL INFRACTOR SE NIEGUE A CANCELAR MULTA',
                'monto' => '50',  
                'id_capitulo' => '2',              
            ],
            

            /*[ 
                'descripcion' => 'Conductor no taria consigo mismo su licencia de conducir',
                'monto' => '15',           
            ],
            [ 
                'descripcion' => 'Conductor circulaba sin luces por la ciudad',
                'monto' => '100', 
            ],
            [ 
                'descripcion' => 'Conductor circulaba por la ciudad en estado d ebriedad',
                'monto' => '500',  
            ],
            [ 
                'descripcion' => 'Conductor circulaba vehiculo sin placa por la ciudad',
                'monto' => '1000',  
            ],
            [ 
                'descripcion' => 'Conductor circulaba vehiculo siendo menor de edad',
                'monto' => '300',
            ],
            [ 
                'descripcion' => 'Conductor incumplio norma de semarofo en rojo',
                'monto' => '250', 
            ],*/
        ];
        foreach($datas as $data){
            Infraccion::create($data);
        }
    }
}
