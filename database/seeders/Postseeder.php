<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Postseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'description' => Str::random(10),
            'category_id' =>1,
            'gallery' =>1,
            'user_id' =>1,
        ]);
    }
}
