<?php

namespace Database\Factories;

use App\Models\ChapterType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterTypeFactory extends Factory
{
    protected $model = ChapterType::class;

    public function definition()
    {
        $name = $this->faker->company;

        return [
            'name' => $name,
            'slug' => str_replace(' ', '_', strtolower($name)),
            'has_command_triad' => true,
        ];
    }
}

