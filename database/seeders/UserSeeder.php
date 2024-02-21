<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'José Braulio Flores Martínez',
            'email'=> 'jbflores24@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Novaly Briannet Flores Salazar',
            'email'=> 'novaly@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Miguel Edgardo Flores Gallegos',
            'email'=> 'miguel@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'José Mauricio Flores Galllegos',
            'email'=> 'mauricio@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
