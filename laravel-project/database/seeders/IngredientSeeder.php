<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            [
                'name' => "Almond Meal",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "White Rice Flour",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Avocados",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Beef Ribs",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Beef Ribs",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Cheese",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Chicken",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Fish",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Ground Beef",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Lamb",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Mushroom",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Pork Ribs",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Sausage",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Seafood",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Butter",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Garlic",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Shrimps",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Pasta",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Lemon juice",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Heavy cream",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Pesto",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Salt",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Pepper",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Parmesan cheese",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Eggs",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Scallops",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Butter",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Cooking oil",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Salmon fillets",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Dijon mustard",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Brown sugar",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Worcestershire sauce",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Onion powder",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Coriander",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Turmeric",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Tuna steaks",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Ground cinnamon",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Lemon zest",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Ginger",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Cayenne pepper",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Pork chops",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Bourbon whiskey",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Soy sauce",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Apple cider vinegar",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Mustard powder",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Chopped onion",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Green bell pepper",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Calvados",
                'is_active' => fake()->boolean()
            ],
            [
                'name' => "Creme fraiche",
                'is_active' => fake()->boolean()
            ]
        ]);
    }
}
