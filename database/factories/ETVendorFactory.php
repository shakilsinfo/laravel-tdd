<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ETVendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'contact_no' => $this->faker->numerify('###########'),
            'address' => $this->faker->address,
            'agreement_paper' => $this->faker->url(),
            'total_vehicle' => $this->faker->numerify('###'),
            'total_owner' => $this->faker->numerify('##'),
            'others_info' => $this->faker->word(),
            'created_by' => 'shakil',
        ];
    }
}
