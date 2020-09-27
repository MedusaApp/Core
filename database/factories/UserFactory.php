<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date('Y-m-d', '2005-12-31'),
            'address_line_1' => $this->faker->buildingNumber . ' ' . $this->faker->streetName,
            'address_line_2' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'province_or_state' => $this->faker->stateAbbr,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'is_active' => true,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}

;
