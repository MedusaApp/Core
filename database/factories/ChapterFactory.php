<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Chapter;
use App\Models\ChapterType;
use App\Models\ShipClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $branches = Branch::all();
        $branch = $branches[mt_rand(0, sizeof($branches) - 1)];

        $chapterTypes = ChapterType::all();
        $chapterType = $chapterTypes[mt_rand(0, sizeof($chapterTypes) - 1)];

        $shipClasses = ShipClass::all();
        $shipClass = $shipClasses[mt_rand(0, sizeof($shipClasses) - 1)];

        $name = 'HMS ' . $this->faker->lastName();
        $hullNumber = mt_rand(1, 10000);
        $commissionDate = date('Y-m-d', mt_rand(1, 1623329551));

        return [
            'name' => $name,
            'ship_class_id' => $shipClass->id,
            'is_active' => true,
            'is_joinable' => true,
            'chapter_type_id' => $chapterType->id,
            'hull_number' => $hullNumber,
            'branch_id' => $branch->id,
            'commission_date' => $commissionDate,
        ];
    }
}
