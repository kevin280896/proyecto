<?php

use Illuminate\Database\Seeder;

class TipoMuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipomueble')->insert([
            'Nombre' => 'Silla'
        ]);
        DB::table('tipomueble')->insert([
            'Nombre' => 'Mesa'
        ]);
        DB::table('tipomueble')->insert([
            'Nombre' => 'Cama'
        ]);
        DB::table('tipomueble')->insert([
            'Nombre' => 'Armario'
        ]);
        DB::table('tipomueble')->insert([
            'Nombre' => 'Linea blanca'
        ]);
    }
}
