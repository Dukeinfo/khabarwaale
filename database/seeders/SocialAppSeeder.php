<?php

namespace Database\Seeders;

use App\Models\SocialApp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SocialApp::truncate();
        $socialMediaData = [
            [
                'name' => 'Facebook',
                'icon' => 'fab fa-facebook-f social-element',
            ],
            [
                'name' => 'Twitter',
                'icon' => 'fab fa-twitter social-element',
            ],
            [
                'name' => 'Instagram',
                'icon' => 'fab fa-instagram social-element',
            ],
            [
                'name' => 'LinkedIn',
                'icon' => 'fab fa-linkedin-in social-element',
            ],
            [
                'name' => 'YouTube',
                'icon' => 'fab fa-youtube social-element',
            ],
        ];

        foreach ($socialMediaData as $data) {
            SocialApp::create($data);
        }
    }
}
