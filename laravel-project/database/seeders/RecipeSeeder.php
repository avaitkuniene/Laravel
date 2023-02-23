<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            [
                'name' => "Skillet Macaroni and Cheese",
                'description' => "Place a medium skillet over medium-high heat. Pour in dry macaroni noodles.
                Pour in enough water to barely cover macaroni. Bring to a boil, stirring continuously.
                Continue stirring the macaroni until water is almost evaporated and pasta is tender yet firm to the bite,
                about 8 minutes. Pour in evaporated milk and cream.
                Add grated cheese and stir until cheese has melted and everything is well combined. Serve immediately.",
                'is_active' => fake()->boolean(),
                'category_id' => fake()->numberBetween(1, 10),
            ],
            [
                'name' => "Tater Tot Casserole",
                'description' => "Preheat the oven to 175 degrees C. Heat a large skillet over medium-high heat. Cook
                and stir ground beef in the hot skillet until completely browned and crumbly, 7 to 10 minutes. Stir in
                condensed soup; season with salt and black pepper. Transfer beef mixture to a 9x13-inch baking dish;
                layer tater tots evenly on top and sprinkle with Cheddar cheese. Bake in the preheated oven until tater
                tots are golden brown and hot, 30 to 45 minutes.",
                'is_active' => fake()->boolean(),
                'category_id' => fake()->numberBetween(1, 10),
            ],
            [
                'name' => "Simple Deep Fried Turkey",
                'description' => "Heat oil in a large stockpot or turkey fryer to 175 degrees C. Make sure the fryer is
                located outdoors in a safe area, preferably on dirt or pavement, and far away from buildings, wooden
                decks, or other objects. Keep a fire extinguisher handy, just in case. Ensure that the turkey is
                completely thawed. Cut any extra skin away from the neck area and make sure neck hole is at least 1
                inch in diameter. Pat the bird completely dry with paper towels, then rub liberally with salt and
                pepper on both the outside and the inside. Place turkey into a drain basket, neck-side first. Working
                slowly and carefully, gently lower the basket into the hot oil to completely cover the turkey.
                Maintain the temperature of the oil at 350 degrees F (175 degrees C), and cook turkey for 3 1/2
                minutes per pound, about 35 minutes. Carefully remove basket from oil, and drain turkey. Insert a meat
                thermometer into the thickest part of the thigh; the internal temperature must be 80 degrees C. Allow
                to rest for 15 minutes before slicing.",
                'is_active' => fake()->boolean(),
                'category_id' => fake()->numberBetween(1, 10),
            ],
            [
                'name' => "Brown Sugar Ham Steak",
                'description' => "Cook ham steak in a large skillet over medium heat until browned, 3 to 4 minutes per
                side. Remove ham from skillet; drain off any fat. Melt butter in the same skillet over medium-low heat.
                Stir in brown sugar. Return ham to skillet. Cook, turning ham often, until heated through and brown
                sugar has dissolved, about 10 minutes. Reduce heat if brown sugar/butter mixture starts to pop or splatter.",
                'is_active' => fake()->boolean(),
                'category_id' => fake()->numberBetween(1, 10),
            ],
            [
                'name' => "Salsa Chicken",
                'description' => "Preheat the oven to 190 degrees C. Lightly grease a 9x13-inch baking dish. Place
                chicken breasts in the prepared dish. Sprinkle seasoning mix on both sides of chicken breasts; pour
                salsa on top. Bake in the preheated oven until chicken is tender and juicy and the juices run clear,
                25 to 35 minutes. Sprinkle chicken evenly with cheese. Continue baking until cheese is melted and
                bubbly, 3 to 5 minutes more. Top with sour cream and serve.",
                'is_active' => fake()->boolean(),
                'category_id' => fake()->numberBetween(1, 10),
            ],
            [
                'name' => "Mayo Chicken",
                'description' => "Preheat the oven to 175 degrees C. Place chicken pieces into a 9x13-inch baking dish.
                Stir together mayonnaise, garlic, rosemary, salt, and black pepper in a bowl. Spread mayonnaise mixture
                over chicken; top with Parmesan cheese. Bake in the preheated oven until no longer pink in the center
                and the juices run clear, about 1 hour and 10 minutes. An instant-read thermometer inserted into the
                center should read at least 74 degrees C.",
                'is_active' => fake()->boolean(),
                'category_id' => fake()->numberBetween(1, 10),
            ],

        ]);
    }
}
