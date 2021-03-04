<?php

namespace Database\Seeders;

use App\Models\Entidad;
use Illuminate\Database\Seeder;

class EntidadSeeder extends Seeder
{
    /**
     * llendo de la BD de entidades
     */
    public function run()
    {
        $entidad = [
            'UDFJC',
            'ITC'
        ];
        for ($i = 0; $i < count($entidad); $i++) {
            $Entidad = new Entidad();
            $Entidad->entidad = $entidad[$i];
            $Entidad->save();
        }
    }
}
