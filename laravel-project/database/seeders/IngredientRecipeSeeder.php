<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 150; $i++) {
            DB::table('ingredient_recipe')->insert([
                [
                    'recipe_id' => fake()->numberBetween(1, 14),
                    'ingredient_id' => fake()->numberBetween(1, 49)
                ]
            ]);
        }
    }
}
