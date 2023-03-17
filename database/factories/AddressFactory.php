<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cep' => fake()->postcode(),
            'address' => fake()->streetAddress(),
            'number' => fake()->buildingNumber(),
            'complement' => fake()->secondaryAddress(),
            'neighborhood' => 'Praia Grande',
            'city' => fake()->city(),
            'state' => fake()->state()
        ];
    }
}
