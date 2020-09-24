<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAsentamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Aeropuerto',
            'c_tipo_asenta' => '01',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Barrio',
            'c_tipo_asenta' => '02',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Colonia',
            'c_tipo_asenta' => '09',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Condominio',
            'c_tipo_asenta' => '10',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Ejido',
            'c_tipo_asenta' => '15',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Equipamiento',
            'c_tipo_asenta' => '17',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Fraccionamiento',
            'c_tipo_asenta' => '21',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Granja',
            'c_tipo_asenta' => '23',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Hacienda',
            'c_tipo_asenta' => '24',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Paraje',
            'c_tipo_asenta' => '45',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Parque industrial',
            'c_tipo_asenta' => '26',
        ]);
        DB::table('d_tipo_asentas')->insert([
            'd_tipo_asenta' => 'Pueblo',
            'c_tipo_asenta' => '28',
        ]);
    }
}
