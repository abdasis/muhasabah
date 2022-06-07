<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactType>
 */
class ContactTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contact_id' => $this->faker->randomNumber(3),
            'type' => $this->faker->randomElement(['Customer', 'Supplier', 'Karyawan', 'Lainnya']),
        ];
    }
}
