<?php

namespace Database\Factories;

use App\Models\ShipClass;
use App\Models\ShipType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipClassFactory extends Factory
{
    protected $model = ShipClass::class;

    public function definition()
    {
        $shipTypes = ShipType::all();

        $shipType = $shipTypes[mt_rand(0, sizeof($shipTypes) - 1)];

        return [
            'name' => $this->faker->company,
            'image_url' => $this->faker->url,
            'officer_min' => mt_rand(0, 3),
            'crew_min' => mt_rand(0, 5),
            'crew_max' => mt_rand(6, 10),
            'type_order' => mt_rand(1, 10),
            'ship_type_id' => $shipType->id,
        ];
    }
}

