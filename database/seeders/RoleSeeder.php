<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::truncate();

        $create = new Role();
        $create->name = "admin";
        $create->save();

        $editor = new Role();
        $editor->name = "editor";
        $editor->save();

        $reporter = new Role();
        $reporter->name = "reporter";
        $reporter->save();

        $dataentery = new Role();
        $dataentery->name = "dataentery";
        $dataentery->save();
    }
}
