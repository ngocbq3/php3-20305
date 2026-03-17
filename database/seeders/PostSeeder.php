<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            DB::table('posts')->insert([
                'title' => fake()->text(15),
                'description'   => fake()->text(25),
                'content'       => fake()->paragraph(),
                'image'         => fake()->imageUrl(),
                'view'          => rand(10, 1000),
                'category_id'   => rand(1, 4)
            ]);
        }
    }
}
