<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NucleoSeeder extends Seeder
{
    /**
     * llenado de la base de datos de nucleos
     */
    public function run()

    {
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Agronomia','are_id'=>1]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Medicina Veterinaria','are_id'=>1]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Zootecnia','are_id'=>1]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Artes plasticas visuales y afines','are_id'=>2]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Artes representativas','are_id'=>2]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Diseño','are_id'=>2]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Música','are_id'=>2]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Otros programas asociados a bellas artes','are_id'=>2]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Publicidad y afines','are_id'=>2]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Educacion','are_id'=>3]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Bacteriología','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Enfermería','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Instrumentación quirúrgica','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Medicina','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Nuticio dietética','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Odontología','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Optometria, otros programas de ciencias en la salud','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Salud pública','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Terapias','are_id'=>4]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Antropología, artes liberales','are_id'=>5]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Bibliotecología, otras ciencias sociales y humanas','are_id'=>5]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Ciencia política, relaciones internacionales','are_id'=>5]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Comunicación social, periodismo y afines','are_id'=>5]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Deportes, educación física y recreación','are_id'=>5]);
        DB::table('nucleos')->insert(['nombre_nucleo' => 'Derecho y afines','are_id'=>5]);

    }
}
