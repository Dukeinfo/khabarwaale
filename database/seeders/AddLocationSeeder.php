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
            'Top Header',
            'Slider Top',
            'Slider Down',
            'Slider Left',
            'Slider Right',
            'Slider Down Left',
            'Slider Down Right',
            'News Sidebar',
            'News Down',
            'News Center',
            'Under Top News',
            'Under World News',
            'Under More News',
        ];

        foreach ($locations as $location) {
            AddLocation::insert([
                'name' => $location,
            ]);
        }
    }
}
