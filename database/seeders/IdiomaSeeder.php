<?php

namespace Database\Seeders;

use App\Models\Idioma;
use Illuminate\Database\Seeder;

class IdiomaSeeder extends Seeder
{
    /**
     * llendo de la BD de idiomas
     */
    public function run()
    {
        $idioma = [
            'Inglés',
            'Alemán',
            'Portugués',
            'Ruso',
            'Mandarín',
            'Francés'
        ];
        for ($i = 0; $i < count($idioma); $i++) {
            $lenguaje = new Idioma();
            $lenguaje->idioma = $idioma[$i];
            $lenguaje->save();
        }
    }
}
