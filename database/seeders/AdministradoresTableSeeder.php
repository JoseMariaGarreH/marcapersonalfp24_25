<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->truncate();

        $users = User::all();

        // Crea un administrador para cada usuario
        foreach($users as $user){
            $user->administrador()->save($user->administrador()->make());
        }
    }
}
