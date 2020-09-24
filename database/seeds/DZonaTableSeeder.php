<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DZonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('d_zonas')->insert([
            'zona' => 'Urbano',
        ]);
        DB::table('d_zonas')->insert([
            'zona' => 'Rural',
        ]);
    }
}
