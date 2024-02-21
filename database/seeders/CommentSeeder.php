<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'comentario' => 'Comentario sobre el artículo 1',
            'estado' => true,
            'article_id'=>1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('comments')->insert([
            'comentario' => 'Comentario sobre el artículo 1',
            'estado' => true,
            'article_id'=>1,
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('comments')->insert([
            'comentario' => 'Comentario sobre el artículo 2',
            'estado' => true,
            'article_id'=>2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('comments')->insert([
            'comentario' => 'Comentario sobre el artículo 2',
            'estado' => false,
            'article_id'=>2,
            'user_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
