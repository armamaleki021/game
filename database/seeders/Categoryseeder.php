<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([
            'title' => Str::random(10),
            'description' => Str::random(10),
            'slug' => Str::random(10),
            'user_id' =>1,
            'gallery_id' =>1,

        ]);
    }
}
