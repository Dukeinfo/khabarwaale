<?php

use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\CkImageUploadController;
use App\Http\Controllers\Frontend\FronendController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Livewire\Backend\AddUsers\CreateUsers;
use App\Livewire\Backend\AddUsers\EditUser;
use App\Livewire\Backend\AdminDashboard;
use App\Livewire\Backend\Advertisment\CreateAdd;
use App\Livewire\Backend\Advertisment\EditAdd;
use App\Livewire\Backend\MenusMaster\CreateMenus;
use App\Livewire\Backend\MenusMaster\EditMenus;
use App\Livewire\Backend\News\CreateNews;
use App\Livewire\Backend\News\EditNews;
use App\Livewire\Backend\Seo\CreateMetadetail;
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
});

// Route::controller(FronendController::class)->group(function () {
// Route::get('/', 'index')->name('home.homepage');
 

// });




Route::get('/', ViewHomepage::class)->name('home.homepage');
Route::get('/category/{id}/{slug}', ViewCategory::class)->name('home.category');
Route::get('/inner/{newsid}/{slug}', ViewInnerPage::class)->name('home.inner');




Livewire::setScriptRoute(function ($handle) {
    return Route::get('/boldpunjab/livewire/livewire.js', $handle);
});
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/boldpunjab/livewire/update', $handle);
        
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

Route::group(['middleware' => 'auth'],function(){
    Route::prefix('admin')->group(function(){

        Route::post('ckeditor/image_upload', [CkImageUploadController::class, 'upload'])->name('image.upload');

Route::get('/dashboard', AdminDashboard::class)->name('admin_dashboard');
Route::get('/profile', AdminProfile::class)->name('admin_profile');
Route::get('/contact-view', ContactusView::class)->name('contact_view');
Route::get('/contact-edit/{id}', ContactusEdit::class)->name('contact_edit');
Route::get('/social-view', SocialAppsManager::class)->name('social_view');
Route::get('/contact-entries', ContactMessages::class)->name('contact_entries');
Route::post('/admin-logout', [AdminLogoutController::class,'adminlogout'])->name('adminlogout');
// CreateMenus
Route::get('/create-menu', CreateMenus::class)->name('create_menus');
Route::get('/edit-menu/{id}', EditMenus::class)->name('edit_menus');

Route::get('/create-user', CreateUsers::class)->name('create_user');
Route::get('/edit-user/{userid}', EditUser::class)->name('edit_user');

Route::get('/create-add', CreateAdd::class)->name('admin.create_add');
Route::get('/edit-add/{addid}', EditAdd::class)->name('admin.edit_add');

Route::get('/create-videos', CreateVideos::class)->name('admin.create_videos');
Route::get('/edit-videos/{vid_id}', EditVideos::class)->name('admin.edit_videos');

Route::get('/create-news', CreateNews::class)->name('admin.create_news');
Route::get('/edit-news/{news_id}', EditNews::class)->name('admin.edit_news');

Route::get('/create-metadetail', CreateMetadetail::class)->name('admin.createMetadetail');







});

});