<?php

namespace Database\Seeders;

use App\Models\ChapterType;
use Illuminate\Database\Seeder;

class ChapterTypeSeeder extends Seeder
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
                'name' => 'Admiralty Bureau',
                'slug' => 'bureau',
            ],
            [
                'name' => 'Admiralty Office',
                'slug' => 'office',
            ],
            [
                'name' => 'Army Barracks',
                'slug' => 'barracks',
            ],
            [
                'name' => 'Army Bivouac',
                'slug' => 'bivouac',
            ],
            [
                'name' => 'Army Fort',
                'slug' => 'fort',
            ],
            [
                'name' => 'Army Outpost',
                'slug' => 'outpost',
            ],
            [
                'name' => 'Army Planetary Command',
                'slug' => 'planetary',
            ],
            [
                'name' => 'Army Theater Command',
                'slug' => 'theater',
            ],
            [
                'name' => 'Barony',
                'slug' => 'barony',
            ],
            [
                'name' => 'College',
                'slug' => 'college',
            ],
            [
                'name' => 'County',
                'slug' => 'county',
            ],
            [
                'name' => 'Division of Ships',
                'slug' => 'division',
            ],
            [
                'name' => 'Duchy',
                'slug' => 'duchy',
            ],
            [
                'name' => 'Fleet',
                'slug' => 'fleet',
            ],
            [
                'name' => 'Fleet Station',
                'slug' => 'fstation',
            ],
            [
                'name' => 'Grand Duchy',
                'slug' => 'grand_duchy',
            ],
            [
                'name' => 'Headquarters Chapter',
                'slug' => 'headquarters',
            ],
            [
                'name' => 'Institute',
                'slug' => 'institute',
            ],
            [
                'name' => 'Junction Control Station',
                'slug' => 'jstation',
            ],
            [
                'name' => 'Junction Fort',
                'slug' => 'jfort',
            ],
            [
                'name' => 'Junction Tug',
                'slug' => 'tug',
            ],
            [
                'name' => 'Keep',
                'slug' => 'keep',
            ],
            [
                'name' => 'Light Attack Craft',
                'slug' => 'lac',
            ],
            [
                'name' => 'Merchant Ship',
                'slug' => 'mship',
            ],
            [
                'name' => 'Naval District',
                'slug' => 'district',
            ],
            [
                'name' => 'Naval Ship',
                'slug' => 'ship',
            ],
            [
                'name' => 'RMMC Assault Shuttle',
                'slug' => 'shuttle',
            ],
            [
                'name' => 'RMMC Battalion',
                'slug' => 'battalion',
            ],
            [
                'name' => 'RMMC Brigade',
                'slug' => 'brigade',
            ],
            [
                'name' => 'RMMC Company',
                'slug' => 'company',
            ],
            [
                'name' => 'RMMC Corps',
                'slug' => 'corps',
            ],
            [
                'name' => 'RMMC Expeditionary Force',
                'slug' => 'exp_force',
            ],
            [
                'name' => 'RMMC Platoon',
                'slug' => 'platoon',
            ],
            [
                'name' => 'RMMC Regiment',
                'slug' => 'regiment',
            ],
            [
                'name' => 'RMMC Section',
                'slug' => 'section',
            ],
            [
                'name' => 'RMMC Squad',
                'slug' => 'squad',
            ],
            [
                'name' => 'Seperation Unit',
                'slug' => 'SU',
            ],
            [
                'name' => 'Service Academy',
                'slug' => 'academy',
            ],
            [
                'name' => 'Small Craft',
                'slug' => 'small_craft',
            ],
            [
                'name' => 'Space Station',
                'slug' => 'station',
            ],
            [
                'name' => 'Squadron of Ships',
                'slug' => 'squadron',
            ],
            [
                'name' => 'Steading',
                'slug' => 'steading',
            ],
            [
                'name' => 'Task Force',
                'slug' => 'task_force',
            ],
            [
                'name' => 'Task Group',
                'slug' => 'task_group',
            ],
            [
                'name' => 'Training Center',
                'slug' => 'center',
            ],
            [
                'name' => 'University',
                'slug' => 'university',
            ],
            [
                'name' => 'University System',
                'slug' => 'university_system',
            ],
        ];

        foreach ($types as $typeToCreate) {
            $type = new ChapterType();
            $type->name = $typeToCreate['name'];
            $type->slug = $typeToCreate['slug'];
            $type->has_command_triad = true;
            $type->save();
        }
    }
}
