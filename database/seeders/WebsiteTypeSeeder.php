<?php

namespace Database\Seeders;

use App\Models\WebsiteType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WebsiteType::truncate();

        // Define your new data and insert it
        $websiteTypes = [
            ['name' => 'Hindi'],
            ['name' => 'English'],
            ['name' => 'Punjabi'],
            ['name' => 'Urdu'],
            // Add more data as needed
        ];

        WebsiteType::insert($websiteTypes);
    }
}
