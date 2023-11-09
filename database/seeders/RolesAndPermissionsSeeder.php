<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=RolesAndPermissionsSeeder

     */
    public function run(): void
    {
        //
        DB::table('users')->delete();
        app()['cache']->forget('spatie.permission.cache');
        Role::query()->delete();
        Permission::query()->delete();
        $adminRole = Role::create(['name' => 'admin']);
        $reporterrRole = Role::create(['name' => 'reporter']);
        $editorRole = Role::create(['name' => 'editor']);


        // Create permissions for managing sliders, services, categories, gallery, and events
        $manage_category_Permission = Permission::create(['name' => 'manage_menu' ,'group_name' =>'category']);
        $manage_user_Permission = Permission::create(['name' => 'manage_user' ,'group_name' =>'user']);
        $manage_roles_Permission = Permission::create(['name' => 'manage_roles','group_name' =>'roles' ]);
        $manage_news_Permission = Permission::create(['name' => 'manage_news','group_name' =>'news' ]);
        $manage_archive_Permission = Permission::create(['name' => 'manage_archive','group_name' =>'archive' ]);
        $manage_banner_Permission = Permission::create(['name' => 'manage_adds','group_name' =>'banner' ]);
        $manage_videos_Permission = Permission::create(['name' => 'manage_videos','group_name' =>'videos' ]);
        $manage_seo_Permission = Permission::create(['name' => 'manage_seo','group_name' =>'seo' ]);
        $manage_contact_Permission = Permission::create(['name' => 'manage_contact_us','group_name' =>'contact' ]);
        $manage_social_app_Permission = Permission::create(['name' => 'manage_social_app','group_name' =>'social_app' ]);


        $adminRole->givePermissionTo([
            $manage_category_Permission,
            $manage_user_Permission,
            $manage_roles_Permission,
            $manage_news_Permission,
            $manage_archive_Permission,
            $manage_banner_Permission,
            $manage_videos_Permission,
            $manage_seo_Permission,
            $manage_contact_Permission,
            $manage_social_app_Permission,
            
        ]);

      // Assign permissions to roles (if needed)
      $reporterrRole->givePermissionTo([
              $manage_news_Permission,            
         ]);

         
      $editorRole->givePermissionTo([
            $manage_news_Permission,            
       ]);

    // Create users and assign roles
    $adminUser = User::create([
        'name' => 'Admin User',
        'role_id' => $adminRole->id,
        'email' => 'admin@example.com',
        'password' => Hash::make('12345678'),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'website_type_id' => 3,
        'status' =>true,

    ]);

    $adminUser->assignRole($adminRole);
    $reporterUser = User::create([
        'name' => 'Parminder Singh',
        'role_id' =>  $reporterrRole->id,
        'email' => 'reporterr@example.com',
        'password' => Hash::make('12345678'),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'website_type_id' => 3,
        'status' =>true,

    ]);
    $reporterUser->assignRole($reporterrRole);

    $editorUser = User::create([
        'name' => 'editor user',
        'role_id' =>  $editorRole->id,
        'email' => 'editor@example.com',
        'password' => Hash::make('12345678'),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'website_type_id' => 3,
        'status' =>true,

    ]);
    $editorUser->assignRole($editorRole);

    }
}
