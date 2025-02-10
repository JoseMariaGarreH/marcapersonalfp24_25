<?php

namespace Database\Seeders;

use App\Models\Actividad;
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
        $actividades = Actividad::all();
        foreach ($actividades as $actividad) {
            $numRelaciones = rand(0,2);
            for ($i = 0; $i < $numRelaciones; $i++) {
                $actividad->competencias()->attach(rand(1, 10));
            }
        }
    }
}
