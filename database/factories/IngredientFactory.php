<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => function () {
                // You can adjust this logic based on how you want to associate ingredients with recipes
                return \App\Models\Recipe::factory()->create()->id;
            },
            'product_id' => function () {
                // You can adjust this logic based on how you want to associate ingredients with products
                return \App\Models\Product::factory()->create()->id;
            },
            'weight_quantity' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
