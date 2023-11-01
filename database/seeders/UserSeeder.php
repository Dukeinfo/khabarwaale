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
        $admin->email = 'admin@khabarwaale.com';
        $admin->email_verified_at = Carbon::now()->toDateTimeString();
        $admin->password = Hash::make('admin@12345678');
        $admin->save();

        $reporter = new User();
        $reporter->name = 'Parminder Singh Jatpuri';
        $reporter->username = 'Parminder Singh Jatpuri';
        $reporter->role_id = 2;
        $reporter->email = 'Reporter@khabarwaale.com';
        $reporter->email_verified_at = Carbon::now()->toDateTimeString();
        $reporter->password = Hash::make('reporter@12345678');
        $reporter->save();
    }
}
