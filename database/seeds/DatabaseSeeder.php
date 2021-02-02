<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(TipoVehiculoSeeder::class);
        $this->call(CapituloTableSeeder::class);
        $this->call(InfraccionSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(OperacionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(MarcaNombreTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
