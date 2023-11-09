<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function assignedMenus()
    {
        return $this->hasMany(AssigneMenu::class, 'user_id');
    }

 
    // public function role()
    // {
    //     return $this->belongsTo(Role::class, 'role_id');
    // }
    public function websiteType()
    {
        return $this->belongsTo(WebsiteType::class, 'website_type_id');
    }

    public function getmenu()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getNewspost()
    {
        return $this->hasMany(NewsPost::class, 'id' ,'user_id');
    }



    public static function getpermissionGroups(){
        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    }// End Method 

    public static function getpermissionByGroupName($group_name){
        $permissions = DB::table('permissions')
                        ->select('name','id')
                        ->where('group_name',$group_name)
                        ->get();
            return $permissions;
    }// End Method 


    public static function roleHasPermissions($role,$permissions){
        $hasPermission = true;
        foreach($permissions as $permission){
           if (!$role->hasPermissionTo($permission->name)) {
               $hasPermission = false;
               return $hasPermission;
               Log::info('Permission not granted: ' . $permission->name);
           }
            return $hasPermission;
        }
      } 


      

}
