<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            Author::create([
                'name' => fake()->name,
                'last_name' => fake()->lastName,
                'date_of_birth' => fake()->dateTime,
                'country' => fake()->country
            ]);
        }
    }
}
