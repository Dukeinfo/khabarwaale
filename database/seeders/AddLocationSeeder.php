<?php

namespace Database\Seeders;

use App\Models\AddLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AddLocation::truncate();

        $locations = [
            'Top Banner',
            'Right Add',
            'Left Add',
            'Under Top News',
            'Center Banner',
            'Bottom Banner',

        ];

        foreach ($locations as $location) {
            AddLocation::insert([
                'name' => $location,
            ]);
        }
    }
}
