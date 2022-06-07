<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->name,
            'other_details' => $this->faker->text,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'handphone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'id_type' => $this->faker->randomElement(['KTP', 'SIM', 'PASSPORT', 'Lainnya']),
            'identity_number' => $this->faker->randomNumber(8),
            'company_name' => $this->faker->company,
            'npwp' => $this->faker->randomNumber(8),
            'telepon' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'bank_name' => $this->faker->company,
            'bank_account_number' => $this->faker->randomNumber(8),
            'branch_office' => $this->faker->company,
            'account_owner' => $this->faker->name,
            'debit_account' => $this->faker->numberBetween(1, 999999),
            'credit_account' => $this->faker->numberBetween(1, 999999),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
