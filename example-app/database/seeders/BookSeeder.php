<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++) {
            Book::create([
                'name' => fake()->name,
                'page_count' => fake()->numberBetween(1, 700),
                'author_id' => fake()->numberBetween(1,10),
                'category_id' => fake()->numberBetween(1,9)
            ]);
        }
    }
}
