<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new User();
        $admin->name = 'Admin';
        $admin->username = 'Admin';

        $admin->role_id = 1;
        $admin->email = 'admin@admin.com';
        $admin->email_verified_at = Carbon::now()->toDateTimeString();
        $admin->password = Hash::make('12345678');
        $admin->save();
    }
}
