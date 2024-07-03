<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('tasks')->insert([
        //         'titre' => Str::random(10),
        //         'description' => Str::random(20),
        //         "status" => "Pas-applique",
        //         'id_user' => 1,
        //         "created_at" => now()
        //     ]);
        // }


        DB::table('tasks')->insert([
            'titre' => "exposer",
            'description' => "exposer de madam agoun",
            "status" => "Pas-applique",
            'id_user' => 1,
            "created_at"=>now()
        ]);


    }
}
