<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * llenado de la base de datos de administrador
         */
        $value="daniel96";
        $usuario=new User();
        $usuario->name="Admin";
        $usuario->email="Admin";
        $usuario->password=Hash::make($value);
        $usuario->save();

    }
}
