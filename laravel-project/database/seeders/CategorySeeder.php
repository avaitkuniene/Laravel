<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => "Indonesian cuisine",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Jamaican food",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Jewish food",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Korean food",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Polish cuisine",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Russian food",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Vietnamese cuisine",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Lithuanian cuisine",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Georgian cuisine",
                'is_active' => fake()->boolean()
            ],
        ]);
    }
}
