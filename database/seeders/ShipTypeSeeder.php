<?php

namespace Database\Seeders;

use App\Models\ShipType;
use Illuminate\Database\Seeder;

class ShipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'abbreviation' => 'Pin',
                'name' => 'Pinnace',
            ],
            [
                'abbreviation' => 'LAC',
                'name' => 'Light Attack Craft',
            ],
            [
                'abbreviation' => 'DD',
                'name' => 'Destroyer',
            ],
            [
                'abbreviation' => 'CL',
                'name' => 'Light Cruiser',
            ],
            [
                'abbreviation' => 'CA',
                'name' => 'Heavy Cruiser',
            ],
            [
                'abbreviation' => 'BC',
                'name' => 'Battlecruiser',
            ],
            [
                'abbreviation' => 'CLAC',
                'name' => 'LAC Carrier',
            ],
            [
                'abbreviation' => 'DN',
                'name' => 'Dreadnaught',
            ],
            [
                'abbreviation' => 'SD',
                'name' => 'Superdreadnaught',
            ],
            [
                'abbreviation' => 'SS',
                'name' => 'Space Station',
            ],
            [
                'abbreviation' => 'QY',
                'name' => 'Queen\'s Yacht',
            ],
            [
                'abbreviation' => 'LF',
                'name' => 'Light Freighter',
            ],
            [
                'abbreviation' => 'MF',
                'name' => 'Medium Freighter',
            ],
            [
                'abbreviation' => 'HF',
                'name' => 'Heavy Freighter',
            ],
            [
                'abbreviation' => 'PL',
                'name' => 'Passenger Liner',
            ],
            [
                'abbreviation' => 'CR',
                'name' => 'Courier',
            ],
            [
                'abbreviation' => 'LPH',
                'name' => 'Marine Heavy Transport',
            ],
            [
                'abbreviation' => 'JCS',
                'name' => 'Junction Control Station',
            ],
            [
                'abbreviation' => 'RSS',
                'name' => 'RMACS Space Station',
            ],
        ];

        foreach ($types as $typeToCreate) {
            $type = new ShipType();
            $type->abbreviation = $typeToCreate['abbreviation'];
            $type->name = $typeToCreate['name'];
            $type->save();
        }
    }
}
