<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \DB::table('roles')->insert([
        ['id_rol' => 1, 'nombre_rol' => 'Gerente', 'descripcion' => 'Administra el restaurante'],
        ['id_rol' => 2, 'nombre_rol' => 'Mesero', 'descripcion' => 'Atención al cliente'],
        ['id_rol' => 3, 'nombre_rol' => 'Cocinero', 'descripcion' => 'Preparación de alimentos'],
    ]);
}
}
