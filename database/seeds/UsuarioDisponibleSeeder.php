<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsuarioDisponibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario_disponibles')->insert(['id_empleado'=>'ge001']);
    }
}
