<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * metodo para vaciar las bd
         */
        $this->truncateTables([
            'areas',
            'nucleos',
            'idiomas',
            'users'
        ]);
        $this->call(AreaSeeder::class);
        $this->call(NucleoSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(EntidadSeeder::class);
        $this->call(UserSeeder::class);
    }
    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS =0;');
        foreach ($tables as $table) :
            DB::table($table)->truncate();
        endforeach;
        DB::statement('SET FOREIGN_KEY_CHECKS =1;');
    }
}
