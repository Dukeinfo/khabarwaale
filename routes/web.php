<?php

use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\CkImageUploadController;
use App\Http\Controllers\FirebasePushController;
use App\Http\Controllers\Frontend\FronendController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Livewire\Backend\ActivityLog\ViewActivitylog;
use App\Livewire\Backend\AddUsers\CreateUsers;
use App\Livewire\Backend\AddUsers\EditUser;
use App\Livewire\Backend\AddUsers\Viewusers;
use App\Livewire\Backend\AdminDashboard;
use App\Livewire\Backend\Advertisment\CreateAdd;
use App\Livewire\Backend\Advertisment\EditAdd;
use App\Livewire\Backend\Archive\AddArchiveNews;
use App\Livewire\Backend\Archive\EditArchiveNews;
use App\Livewire\Backend\MenusMaster\CreateMenus;
use App\Livewire\Backend\MenusMaster\EditMenus;
use App\Livewire\Backend\News\CreateNews;
use App\Livewire\Backend\News\EditNews;
use App\Livewire\Backend\News\EditReporterNews;
use App\Livewire\Backend\RoleAndPermissions\AddRolesPermissions;
use App\Livewire\Backend\RoleAndPermissions\EditAllPermission;
use App\Livewire\Backend\RoleAndPermissions\EditRoles;
use App\Livewire\Backend\RoleAndPermissions\EditRolesPermissions;
use App\Livewire\Backend\RoleAndPermissions\ViewAllPermission;
use App\Livewire\Backend\RoleAndPermissions\ViewRoles;
use App\Livewire\Backend\Seo\CreateFooterSnippets;
use App\Livewire\Backend\Seo\CreateHeaderSnippets;
use App\Livewire\Backend\Seo\CreateMetadetail;
use App\Livewire\Backend\Seo\EditFooterSnippets;
use App\Livewire\Backend\Seo\EditHeaderSnippets;
use App\Livewire\Backend\Seo\EditMetadetail;
use App\Livewire\Backend\Settings\AdminProfile;
use App\Livewire\Backend\Settings\ContactMessages;
use App\Livewire\Backend\Settings\ContactusEdit;
use App\Livewire\Backend\Settings\ContactusView;
use App\Livewire\Backend\Settings\SocialAppsManager;
use App\Livewire\Backend\Videos\CreateVideos;
use App\Livewire\Backend\Videos\EditVideos;
use App\Livewire\Frontend\Category\ViewCategory;
use App\Livewire\Frontend\Homepage\ViewHomepage;
use App\Livewire\Frontend\Innerpage\ViewInnerPage;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Spatie\Browsershot\Browsershot;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|      "masbug/flysystem-google-drive-ext": "^2.2",
*/
// Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');

Route::controller(LanguageController::class)->group(function () {
    Route::get('/language/english',  'english')->name('english.language');
    Route::get('/language/hindi',  'Hindi')->name('hindi.language');
    Route::get('/language/punjabi',  'punjabi')->name('punjabi.language');
    Route::get('/language/urdu',  'urdu')->name('urdu.language');
    Route::get('/language/clear',  'clear_all_Lang');
});

Route::controller(FronendController::class)->group(function () {
    Route::get('/', 'index')->name('home.homepage');
    Route::get('/category/{id}/{slug}', 'category')->name('home.category');
    Route::get('/inner/{newsid}/{slug}',  'inner')->name('home.inner');
    Route::get('/video-gallery',  'videoGallery')->name('home.video-gallery');
    Route::get('/archive/{id}/{slug}',  'archive')->name('home.archive');
    Route::get('/archive-page',  'archive_page')->name('home.archive_page');

    Route::get('/readmore',  'readMore')->name('readmore');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacyPolicy');
    Route::get('/reporter-news',  'reporterNews')->name('home.reporter_news');
    Route::get('/subscriber/verify/{token}/{email}', 'verify')->name('subscriber_verify');

});


Livewire::setScriptRoute(function ($handle) {
    return Route::get('/livewire/livewire.js', $handle);
});
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect()->route('admin_dashboard');
    })->name('dashboard');
});

Route::group(['middleware' =>   ['auth']], function () {
    Route::post('/store-token', [FirebasePushController::class, 'updateDeviceToken'])->name('store.token');
    Route::post('/send-web-notification', [FirebasePushController::class, 'sendNotification'])->name('send.web-notification');

    Route::prefix('admin')->group(function () {
        Route::post('ckeditor/image_upload', [CkImageUploadController::class, 'upload'])->name('image.upload');
        Route::get('/dashboard', AdminDashboard::class)->name('admin_dashboard');
        Route::post('/admin-logout', [AdminLogoutController::class, 'adminlogout'])->name('adminlogout');
        Route::get('/profile', AdminProfile::class)->name('admin_profile');
        Route::get('/contact-entries', ContactMessages::class)->name('contact_entries');
        Route::get('/activity-log', ViewActivitylog::class)->name('View_Activitylog');

        Route::group(['middleware' => ['can:manage_social_app']], function () {
            Route::get('/social-view', SocialAppsManager::class)->name('social_view');
        });

        Route::group(['middleware' => ['can:manage_contact_us']], function () {

            Route::get('/contact-view', ContactusView::class)->name('contact_view');
            Route::get('/contact-edit/{id}', ContactusEdit::class)->name('contact_edit');
        });

        // CreateMenus

        Route::group(['middleware' => ['can:manage_menu']], function () {
            Route::get('/create-menu', CreateMenus::class)->name('create_menus');
            Route::get('/edit-menu/{id}', EditMenus::class)->name('edit_menus');
        });

        Route::group(['middleware' => ['can:manage_user']], function () {
            Route::get('/create-user', CreateUsers::class)->name('create_user');
            Route::get('/edit-user/{userid}', EditUser::class)->name('edit_user');
            Route::get('/view-user/{id}', Viewusers::class)->name('view_userDetail');
        });

        Route::group(['middleware' => ['can:manage_roles']], function () {
            Route::get('/view-permissions', ViewAllPermission::class)->name('admin.view_permissions');
            Route::get('/edit-permissions/{id}', EditAllPermission::class)->name('admin.edit_permissions');

            Route::get('/view-roles', ViewRoles::class)->name('admin.view_roles');
            Route::get('/edit-roles/{id}', EditRoles::class)->name('admin.edit_roles');

            Route::get('/add-roles', AddRolesPermissions::class)->name('admin.add_roles');
            Route::get('/edit-roles-permission/{id}', EditRolesPermissions::class)->name('admin.edit_roles_permissions');
        });

        Route::group(['middleware' => ['can:manage_adds']], function () {
            Route::get('/create-add', CreateAdd::class)->name('admin.create_add');
            Route::get('/edit-add/{addid}', EditAdd::class)->name('admin.edit_add');
        });

        Route::group(['middleware' => ['can:manage_videos']], function () {

            Route::get('/create-videos', CreateVideos::class)->name('admin.create_videos');
            Route::get('/edit-videos/{vid_id}', EditVideos::class)->name('admin.edit_videos');
        });
        Route::group(['middleware' => ['can:manage_news']], function () {
            // Your routes that require at least one of the specified permissions
            Route::get('/create-news', CreateNews::class)->name('admin.create_news');
            Route::get('/edit-news/{news_id}', EditNews::class)->name('admin.edit_news');

            Route::get('/edit-auth-news/{news_id}', EditReporterNews::class)->name('admin.edit_reporter_news');

            // 
        });

        Route::group(['middleware' => ['can:manage_archive']], function () {


            Route::get('/add-Archive', AddArchiveNews::class)->name('admin.Add_Archive_News');
            Route::get('/edit-Archive/{archiveId}', EditArchiveNews::class)->name('admin.edit_Archive_News');
        });

        Route::group(['middleware' => ['can:manage_seo']], function () {

            Route::get('/create-metadetail', CreateMetadetail::class)->name('admin.createMetadetail');
            Route::get('/edit-metadetail/{id}', EditMetadetail::class)->name('admin.editMetadetail');

            Route::get('/create-headerSnipped', CreateHeaderSnippets::class)->name('admin.createHeaderSnipped');
            Route::get('/edit-headerSnipped/{id}', EditHeaderSnippets::class)->name('admin.editeaderSnipped');

            Route::get('/create-footerSnipped', CreateFooterSnippets::class)->name('admin.createfooterSnipped');
            Route::get('/edit-footerSnipped/{id}', EditFooterSnippets::class)->name('admin.editfooterSnipped');
        });
    });
});
