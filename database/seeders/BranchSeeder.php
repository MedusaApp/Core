<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branchesToCreate = [
            [
                'abbreviation' => 'RMA',
                'name' => 'Royal Manticoran Army',
                'is_civilian' => false,
            ],
            [
                'abbreviation' => 'RMACS',
                'name' => 'Royal Manticoran Astro-Control Service',
                'is_civilian' => true,
            ],
            [
                'abbreviation' => 'RMMC',
                'name' => 'Royal Manticoran Marine Corp',
                'is_civilian' => false,
            ],
            [
                'abbreviation' => 'RMMM',
                'name' => 'Royal Manticoran Merchant Marine',
                'is_civilian' => true,
            ],
            [
                'abbreviation' => 'RMN',
                'name' => 'Royal Manticoran Navy',
                'is_civilian' => false,
            ],
            [
                'abbreviation' => 'GSN',
                'name' => 'Grayson Space Navy',
                'is_civilian' => false,
            ],
            [
                'abbreviation' => 'IAN',
                'name' => 'Imperial Andermani Navy',
                'is_civilian' => false,
            ],
            [
                'abbreviation' => 'RHN',
                'name' => 'Republic of Haven Navy',
                'is_civilian' => false,
            ],
            [
                'abbreviation' => 'CIVIL',
                'name' => 'Civil Service/Government and Diplomatic Corp',
                'is_civilian' => true,
            ],
            [
                'abbreviation' => 'INTEL',
                'name' => 'Civil Service/Espionage and Intelligence',
                'is_civilian' => true,
            ],
            [
                'abbreviation' => 'SFS',
                'name' => 'Civil Service/Sphinx Forestry Service',
                'is_civilian' => true,
            ],
        ];

        foreach($branchesToCreate as $branchToCreate) {
            $branch = new Branch();
            $branch->abbreviation = $branchToCreate['abbreviation'];
            $branch->name = $branchToCreate['name'];
            $branch->is_civilian = $branchToCreate['is_civilian'];
            $branch->save();
        }
    }
}
