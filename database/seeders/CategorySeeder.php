<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();
        $categories = [
            [
                'category_en' => 'Punjab',
                'category_hin' => 'पंजाब',
                'category_pbi' => 'ਪੰਜਾਬ',
                'category_urdu' => 'پنجاب',
            ],
            [
                'category_en' => 'Chandigarh',
                'category_hin' => 'चंडीगढ़',
                'category_pbi' => 'ਚੰਡੀਗੜ੍ਹ',
                'category_urdu' => 'چندیگڑہ',
            ],
            [
                'category_en' => 'Haryana/Himachal',
                'category_hin' => 'हरियाणा/हिमाचल',
                'category_pbi' => 'ਹਰਿਆਣਾ/ਹਿਮਾਚਲ',
                'category_urdu' => 'ہریانہ/ہماچل',
            ],
            [
                'category_en' => 'National',
                'category_hin' => 'राष्ट्रीय',
                'category_pbi' => 'ਨੈਸ਼ਨਲ',
                'category_urdu' => 'قومی',
            ],
            [
                'category_en' => 'World',
                'category_hin' => 'विश्व',
                'category_pbi' => 'ਵਰਲਡ',
                'category_urdu' => 'عالمی',
            ],
            [
                'category_en' => 'Sports',
                'category_hin' => 'खेल',
                'category_pbi' => 'ਖੇਡ',
                'category_urdu' => 'کھیل',
            ],
            [
                'category_en' => 'Entertainment',
                'category_hin' => 'मनोरंजन',
                'category_pbi' => 'ਮਨੋਰੰਜਨ',
                'category_urdu' => 'تفریح',
            ],
            [
                'category_en' => 'Literature',
                'category_hin' => 'साहित्य',
                'category_pbi' => 'ਸਾਹਿਤ',
                'category_urdu' => 'ادب',
            ],
           
        ];

        DB::table('categories')->insert($categories);
    }
}
