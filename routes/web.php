<?php

use App\Http\Controllers\AdminLogoutController;
use App\Livewire\Backend\AddUsers\CreateUsers;
use App\Livewire\Backend\AdminDashboard;
use App\Livewire\Backend\MenusMaster\CreateMenus;
use App\Livewire\Backend\MenusMaster\EditMenus;
use App\Livewire\Backend\Settings\AdminProfile;
use App\Livewire\Backend\Settings\ContactMessages;
use App\Livewire\Backend\Settings\ContactusEdit;
use App\Livewire\Backend\Settings\ContactusView;
use App\Livewire\Backend\Settings\SocialAppsManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('home.homepage');
Route::get('/category', function () {
    return view('category');
})->name('home.category');
Route::get('/inner', function () {
    return view('inner');
})->name('home.inner');;


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





});

});