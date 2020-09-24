<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_estados')->insert([
            'c_estado' => '04',
            'd_estado' => 'Campeche',
        ]);
        DB::table('d_estados')->insert([
            'c_estado' => '05',
            'd_estado' => 'Coahuila de Zaragoza',
        ]);
    }
}
