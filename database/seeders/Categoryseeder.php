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
            'body' => Str::random(1000),
            'slug' => Str::random(10),

        ]);
    }
}
