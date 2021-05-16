<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    protected $model = Branch::class;

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
            'is_civilian' => (mt_rand(0, 1) == 1),
        ];
    }
}

