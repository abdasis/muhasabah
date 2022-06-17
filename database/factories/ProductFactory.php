<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->unique()->randomElement(['Samsung A52s', 'Samsung A72', 'Apple Max Pro', 'Apple iPhone XS', 'Asus Max Pro M1', 'Asus ROG Strix']),
            'description' => $this->faker->text,
            'tax' => $this->faker->randomNumber(2),
            'is_saleable' => $this->faker->boolean,
            'sale_account' => $this->faker->randomNumber(6),
            'sales_price' => $this->faker->randomFloat(2, 1000000, 20000000),
            'purchase_account' => $this->faker->randomNumber(2),
            'is_purchaseable' => $this->faker->boolean,
            'purchase_price' => $this->faker->randomFloat(2, 900000, 19000000),
            'images' => $this->faker->text,
        ];
    }
}
