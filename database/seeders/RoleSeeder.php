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
        // Role::truncate();

        $create = new Role();
        $create->name = "admin";
        $create->guard_name = "web";
        $create->save();

        $editor = new Role();
        $editor->name = "editor";
        $editor->guard_name = "web";
        $editor->save();

        $reporter = new Role();
        $reporter->name = "reporter";
        $reporter->guard_name = "web";
        $reporter->save();

        $dataentery = new Role();
        $dataentery->name = "dataentery";
        $dataentery->guard_name = "web";

        $dataentery->save();
    }
}
