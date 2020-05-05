<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos')->insert(['nombre'=>'cajero', 'mas_de_uno' => '1']);
        DB::table('puestos')->insert(['nombre'=>'almacenista', 'mas_de_uno' => '1']);
        DB::table('puestos')->insert(['nombre'=>'gerente', 'mas_de_uno' => '0', 'tomado' => '0']);
    }
}

