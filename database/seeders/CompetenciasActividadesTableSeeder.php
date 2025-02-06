<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciasActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('competencias_actividades')->truncate();
        // Asignar competencias a actividades
        $data = [];
        $numRelaciones = rand(0,2);
        for ($i = 1; $i < $numRelaciones; $i++) {
            $data[] = [
                'competencia_id' => rand(1,10),
                'actividad_id' => rand(1,10),
            ];
        }
        DB::table('competencias_actividades')->insert($data);
    }
}
