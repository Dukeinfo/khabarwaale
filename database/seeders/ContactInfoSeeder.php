<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contact_infos')->truncate();
/* `duke_newsportal`.`contact_infos` */
        $contact_infos = array(
            array('footer_logo' => 'logos/NAsilpaZGXbpIhCUjv017mU1MA71hjTI3oAgmAXe.png','disclaimer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio..','email' => 'newskhabarwaale@gmail.com','website' => 'http://127.0.0.1:8000/','phone' => ' +91-9815481679','alternate_phone' => NULL,'address' => 'C-2, SCO 86-87, TF, Sector 45-C, Chandigarh','address2' => NULL,'app_link' => NULL,'zip_code' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-10-18 21:03:25','updated_at' => '2023-10-18 21:16:25')
        );
        DB::table('contact_infos')->insert($contact_infos);
    }
}
