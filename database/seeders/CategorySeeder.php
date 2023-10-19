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
        $categories = array(
            array('category_en' => 'Punjab','category_hin' => 'पंजाब','category_pbi' => 'ਪੰਜਾਬ','category_urdu' => 'پنجاب','slug' => 'punjab','route_link' => NULL,'sort_id' => '1','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' =>  now()),
            array('category_en' => 'Chandigarh','category_hin' => 'चंडीगढ़','category_pbi' => 'ਚੰਡੀਗੜ੍ਹ','category_urdu' => 'چندیگڑہ','slug' => 'chandigarh','route_link' => now(),'sort_id' => '2','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' =>  now()),
            array('category_en' => 'Haryana/Himachal','category_hin' => 'हरियाणा/हिमाचल','category_pbi' => 'ਹਰਿਆਣਾ/ਹਿਮਾਚਲ','category_urdu' => 'ہریانہ/ہماچل','slug' => NULL,'route_link' => NULL,'sort_id' => '6','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('category_en' => 'National','category_hin' => 'राष्ट्रीय','category_pbi' => 'ਨੈਸ਼ਨਲ','category_urdu' => 'قومی','slug' => NULL,'route_link' => NULL,'sort_id' => '5','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('category_en' => 'World','category_hin' => 'विश्व','category_pbi' => 'ਵਰਲਡ','category_urdu' => 'عالمی','slug' => NULL,'route_link' => NULL,'sort_id' => '4','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' =>  now()),
            array('category_en' => 'Sports','category_hin' => 'खेल','category_pbi' => 'ਖੇਡ','category_urdu' => 'کھیل','slug' => NULL,'route_link' => NULL,'sort_id' => '3','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' =>  now()),
            array('category_en' => 'Entertainment','category_hin' => 'मनोरंजन','category_pbi' => 'ਮਨੋਰੰਜਨ','category_urdu' => 'تفریح','slug' => 'entertainment','route_link' => NULL,'sort_id' => '7','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' =>  now()),
            array('category_en' => 'Literature','category_hin' => 'साहित्य','category_pbi' => 'ਸਾਹਿਤ','category_urdu' => 'ادب','slug' => 'literature','route_link' => NULL,'sort_id' => '8','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' =>  now())
          );
          
          foreach ( $categories as $key => $name) {
            DB::table('categories')->create($name);
        }
 
    }
}
