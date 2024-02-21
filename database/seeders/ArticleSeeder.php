<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            'titulo' => 'Artículo 1',
            'imagen' => 'img1.jpg',
            'texto'=>'texto del artículo 1',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('articles')->insert([
            'titulo' => 'Artículo 2',
            'imagen' => 'img2.jpg',
            'texto'=>'texto del artículo 3',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('articles')->insert([
            'titulo' => 'Artículo 3',
            'imagen' => 'img3.jpg',
            'texto'=>'texto del artículo 3',
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('articles')->insert([
            'titulo' => 'Artículo 4',
            'imagen' => 'img4.jpg',
            'texto'=>'texto del artículo 4',
            'user_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('articles')->insert([
            'titulo' => 'Artículo 5',
            'imagen' => 'img5.jpg',
            'texto'=>'texto del artículo 5',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
