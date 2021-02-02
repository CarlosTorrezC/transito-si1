<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use App\Vehiculo;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name' => 'Navegar Usuarios',
            'slug' => 'users.index',
            'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Usuarios',
            'slug' => 'users.create',
            'description' => 'Crear usuarios al sistema',
        ]);
        Permission::create([
            'name' => 'Ver Usuarios',
            'slug' => 'users.show',
            'description' => 'Ver detalles de los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Editar Usuarios',
            'slug' => 'users.edit',
            'description' => 'Editar datos de los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Usuarios',
            'slug' => 'users.destroy',
            'description' => 'Eliminar cualquier usuarios del sistema',
        ]);

        //Roles
        Permission::create([
            'name' => 'Navegar Roles',
            'slug' => 'roles.index',
            'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Roles',
            'slug' => 'roles.show',
            'description' => 'Ver detalles de los roles del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Roles',
            'slug' => 'roles.create',
            'description' => 'Crear roles en el sistema sistema',
        ]);
        Permission::create([
            'name' => 'Editar Roles',
            'slug' => 'roles.edit',
            'description' => 'Editar cualquier roles del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Roles',
            'slug' => 'roles.destroy',
            'description' => 'Eliminar cualquier roles del sistema',
        ]);

        //Productos
        /*Permission::create([
            'name' => 'Navegar Productos',
            'slug' => 'products.index',
            'description' => 'Lista y navega todos los productos del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Producto',
            'slug' => 'products.show',
            'description' => 'Ver detalles de los productos del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Producto',
            'slug' => 'products.create',
            'description' => 'Crear productos al sistema',
        ]);
        Permission::create([
            'name' => 'Editar Producto',
            'slug' => 'products.edit',
            'description' => 'Editar cualquier productos del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Producto',
            'slug' => 'products.destroy',
            'description' => 'Eliminar cualquier productos del sistema',
        ]);*/


        //Vehiculo
        Permission::create([
            'name' => 'Navegar Vehiculo',
            'slug' => 'vehiculo.index',
            'description' => 'Lista y navega todos los vehiculos del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Vehiculo',
            'slug' => 'vehiculo.show',
            'description' => 'Ver detalles de los vehiculos del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Vehiculo',
            'slug' => 'vehiculo.create',
            'description' => 'Crear vehiculos al sistema',
        ]);
        Permission::create([
            'name' => 'Editar Vehiculo',
            'slug' => 'vehiculo.edit',
            'description' => 'Editar cualquier vehiculos del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Vehiculo',
            'slug' => 'vehiculo.destroy',
            'description' => 'Eliminar cualquier vehiculos del sistema',
        ]);


        //Multa
        Permission::create([
            'name' => 'Navegar Multa',
            'slug' => 'multa.index',
            'description' => 'Lista y navega todos los multas del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Multa',
            'slug' => 'multa.show',
            'description' => 'Ver detalles de los multas del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Multa',
            'slug' => 'multa.create',
            'description' => 'Crear multas al sistema',
        ]);
        Permission::create([
            'name' => 'Editar Multa',
            'slug' => 'multa.edit',
            'description' => 'Editar cualquier multas del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Multa',
            'slug' => 'multa.destroy',
            'description' => 'Eliminar cualquier multas del sistema',
        ]);

        //Oficiales
        Permission::create([
            'name' => 'Navegar Oficial',
            'slug' => 'oficial.index',
            'description' => 'Lista y navega todos los oficials del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Oficial',
            'slug' => 'oficial.show',
            'description' => 'Ver detalles de los oficials del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Oficial',
            'slug' => 'oficial.create',
            'description' => 'Crear oficials al sistema',
        ]);
        Permission::create([
            'name' => 'Editar Oficial',
            'slug' => 'oficial.edit',
            'description' => 'Editar cualquier oficials del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Oficial',
            'slug' => 'oficial.destroy',
            'description' => 'Eliminar cualquier oficials del sistema',
        ]);

        //Ciudadanos
        Permission::create([
            'name' => 'Navegar Ciudadano',
            'slug' => 'ciudadano.index',
            'description' => 'Lista y navega todos los ciudadanos del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Ciudadano',
            'slug' => 'ciudadano.show',
            'description' => 'Ver detalles de los ciudadanos del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Ciudadano',
            'slug' => 'ciudadano.create',
            'description' => 'Crear ciudadanos al sistema',
        ]);
        Permission::create([
            'name' => 'Editar Ciudadano',
            'slug' => 'ciudadano.edit',
            'description' => 'Editar cualquier ciudadanos del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Ciudadano',
            'slug' => 'ciudadano.destroy',
            'description' => 'Eliminar cualquier ciudadanos del sistema',
        ]);

        //Licencia T
        Permission::create([
            'name' => 'Navegar Licencias T',
            'slug' => 'licenciasT.index',
            'description' => 'Lista y navega todos las licenciasT del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Licencias T',
            'slug' => 'licenciasT.show',
            'description' => 'Ver detalles de las licenciasT del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Licencias T',
            'slug' => 'licenciasT.create',
            'description' => 'Crear licenciasT en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar Licencias T',
            'slug' => 'licenciasT.edit',
            'description' => 'Editar cualquier licenciasT del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Licencias T',
            'slug' => 'licenciasT.destroy',
            'description' => 'Eliminar cualquier ciudadanos del sistema',
        ]);


        //Licencia M
        Permission::create([
            'name' => 'Navegar Licencias M',
            'slug' => 'licenciasM.index',
            'description' => 'Lista y navega todos las licenciasM del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Licencias M',
            'slug' => 'licenciasM.show',
            'description' => 'Ver detalles de las licenciasM del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Licencias M',
            'slug' => 'licenciasM.create',
            'description' => 'Crear licenciasM en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar Licencias M',
            'slug' => 'licenciasM.edit',
            'description' => 'Editar cualquier licenciasM del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Licencias M',
            'slug' => 'licenciasM.destroy',
            'description' => 'Eliminar cualquier licenciasM del sistema',
        ]);

        //Licencia A
        Permission::create([
            'name' => 'Navegar licencias A',
            'slug' => 'licenciasA.index',
            'description' => 'Lista y navega todos las licenciasA del sistema',
        ]);
        Permission::create([
            'name' => 'Ver licencias A',
            'slug' => 'licenciasA.show',
            'description' => 'Ver detalles de las licenciasA del sistema',
        ]);
        Permission::create([
            'name' => 'Crear licencias A',
            'slug' => 'licenciasA.create',
            'description' => 'Crear licenciasA en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar licencias A',
            'slug' => 'licenciasA.edit',
            'description' => 'Editar cualquier licenciasA del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar licencias A',
            'slug' => 'licenciasA.destroy',
            'description' => 'Eliminar cualquier licenciasA del sistema',
        ]);

        //Infracciones
        Permission::create([
            'name' => 'Navegar infraccion',
            'slug' => 'infraccion.index',
            'description' => 'Lista y navega todos las infraccion del sistema',
        ]);
        Permission::create([
            'name' => 'Crear infraccion',
            'slug' => 'infraccion.create',
            'description' => 'Crear infraccion en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar infraccion',
            'slug' => 'infraccion.edit',
            'description' => 'Editar cualquier infraccion del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar infraccion',
            'slug' => 'infraccion.destroy',
            'description' => 'Eliminar cualquier infraccion del sistema',
        ]);

        //Categoria
        Permission::create([
            'name' => 'Navegar categorias',
            'slug' => 'categorias.index',
            'description' => 'Lista y navega todos las categorias del sistema',
        ]);
        Permission::create([
            'name' => 'Crear categorias',
            'slug' => 'categorias.create',
            'description' => 'Crear categorias en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar categorias',
            'slug' => 'categorias.edit',
            'description' => 'Editar cualquier categorias del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar categorias',
            'slug' => 'categorias.destroy',
            'description' => 'Eliminar cualquier categorias del sistema',
        ]);

        //Historial
        /*Permission::create([
            'name' => 'Navegar historial',
            'slug' => 'historial.index',
            'description' => 'Lista y navega todos las historiales del sistema',
        ]);
        Permission::create([
            'name' => 'Ver historial',
            'slug' => 'historial.show',
            'description' => 'Ver detalles de los historiales del sistema',
        ]);
        Permission::create([
            'name' => 'Crear historial',
            'slug' => 'historial.create',
            'description' => 'Crear historial en el sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar historial',
            'slug' => 'historial.destroy',
            'description' => 'Eliminar cualquier historial del sistema',
        ]);*/

        //Reporte
        Permission::create([
            'name' => 'Navegar reporte',
            'slug' => 'reporte.index',
            'description' => 'Lista y navega todos los reporte del sistema',
        ]);
        Permission::create([
            'name' => 'Ver reporte',
            'slug' => 'reporte.show',
            'description' => 'Ver detalles de los reporte del sistema',
        ]);
        Permission::create([
            'name' => 'Crear reporte',
            'slug' => 'reporte.create',
            'description' => 'Crear reporte en el sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar reporte',
            'slug' => 'reporte.destroy',
            'description' => 'Eliminar cualquier reporte del sistema',
        ]);

        //Seguro
        Permission::create([
            'name' => 'Navegar seguro',
            'slug' => 'seguro.index',
            'description' => 'Lista y navega todos los seguro del sistema',
        ]);
        Permission::create([
            'name' => 'Ver seguro',
            'slug' => 'seguro.show',
            'description' => 'Ver detalles de los seguro del sistema',
        ]);
        Permission::create([
            'name' => 'Crear seguro',
            'slug' => 'seguro.create',
            'description' => 'Crear seguro en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar seguro',
            'slug' => 'seguro.edit',
            'description' => 'Editar cualquier seguro vehicular del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar seguro',
            'slug' => 'seguro.destroy',
            'description' => 'Eliminar cualquier seguro del sistema',
        ]);

        //Marca
        Permission::create([
            'name' => 'Navegar marcas de autos',
            'slug' => 'marcas.index',
            'description' => 'Lista y navega todos los marcas de autos del sistema',
        ]);
        Permission::create([
            'name' => 'Crear marcas de autos',
            'slug' => 'marcas.create',
            'description' => 'Crear marca de auto en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar marca',
            'slug' => 'marcas.edit',
            'description' => 'Editar cualquier marca vehicular del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar marcas de autos',
            'slug' => 'marcas.destroy',
            'description' => 'Eliminar cualquier marca de auto del sistema',
        ]);

        //Nombre
        Permission::create([
            'name' => 'Navegar nombres de marcas',
            'slug' => 'nombre.index',
            'description' => 'Lista y navega todos los nombres de marcas del sistema',
        ]);
        Permission::create([
            'name' => 'Crear nombre de autos',
            'slug' => 'nombre.create',
            'description' => 'Crear nombre de marca en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar nombre de autos',
            'slug' => 'nombre.edit',
            'description' => 'Editar cualquier nombre vehicular del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar nombre de autos',
            'slug' => 'nombre.destroy',
            'description' => 'Eliminar cualquier nombre de marca del sistema',
        ]);

        //Titulo
        Permission::create([
            'name' => 'Navegar titulos del Codigo de Transito',
            'slug' => 'titulos.index',
            'description' => 'Lista y navega todos los titulos del Codigo de Transito en el sistema',
        ]);
        Permission::create([
            'name' => 'Crear titulos',
            'slug' => 'titulos.create',
            'description' => 'Crear titulos del Codigo de Transito  al sistema',
        ]);
        Permission::create([
            'name' => 'Editar titulos',
            'slug' => 'titulos.edit',
            'description' => 'Editar cualquier titulo del Codigo de Transito del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar titulos',
            'slug' => 'titulos.destroy',
            'description' => 'Eliminar cualquier titulos del sistema',
        ]);

        //Capitulo
        Permission::create([
            'name' => 'Navegar Capitulos de Titulo del Codigo de Transito',
            'slug' => 'capitulos.index',
            'description' => 'Lista y navega todos los capitulos en el sistema',
        ]);
        Permission::create([
            'name' => 'Crear capitulos',
            'slug' => 'capitulos.create',
            'description' => 'Crear capitulos en el sistema',
        ]);
        Permission::create([
            'name' => 'Editar capitulos',
            'slug' => 'capitulos.edit',
            'description' => 'Editar cualquier capitulos',
        ]);
        Permission::create([
            'name' => 'Eliminar capitulos',
            'slug' => 'capitulos.destroy',
            'description' => 'Eliminar cualquier capitulos del sistema',
        ]);

        //Bitacora
        Permission::create([
            'name' => 'Visualizar Bitacora',
            'slug' => 'bitacora.index',
            'description' => 'Solo acceso administrativo permitido',
        ]);

        //Consulta Licencia
        Permission::create([
            'name' => 'Consultar Licencias',
            'slug' => 'pages.consulta',
            'description' => 'Consulta de todas las licencias que tenga el ciudadano',
        ]);
    }
}
