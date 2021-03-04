<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * llendo de la BD de areas
         */

        DB::table('areas')->insert(['nombre_area' => 'Agronomia, Veterinaria y afines']);
        DB::table('areas')->insert(['nombre_area' => 'Bellas artes']);
        DB::table('areas')->insert(['nombre_area'=>'Ciencias de la educacion']);
        DB::table('areas')->insert(['nombre_area'=>'Ciencias de la salud']);
        DB::table('areas')->insert(['nombre_area'=>'Ciencias sociales y humanas']);
        DB::table('areas')->insert(['nombre_area'=>'Economía, administracion, contaduria y afines']);
        DB::table('areas')->insert(['nombre_area'=>'Ingenieria, arquitectura, urbanismo y afines']);
        DB::table('areas')->insert(['nombre_area'=>'Matematica y ciencias naturales']);

    }
}
