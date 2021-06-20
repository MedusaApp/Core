<?php

namespace Database\Factories;

use App\Models\ShipType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipTypeFactory extends Factory
{
    protected $model = ShipType::class;

    public function definition()
    {
        $name = $this->faker->company;

        $nameBits = explode(' ', $name);

        $abbreviation = '';

        foreach($nameBits as $bit) {
            $abbreviation .= ucwords($bit[0]);
        }

        return [
            'abbreviation' => $abbreviation,
            'name' => $name,
        ];
    }
}

