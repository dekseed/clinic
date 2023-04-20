<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterPatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('pages.home');
    return redirect()->route('login');
});

Route::controller(MainController::class)->group(function () {

    Route::get('/patient/register', 'register')->name('register.patient');

});

Route::controller(RegisterPatientController::class)->group(function () {

    Route::post('/patient/register/store', 'store')->name('register_store.patient');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





    Route::controller(ManageController::class)->middleware('auth')->group(function () {
        // Route::get('/', 'index')->name('manage.home');
        Route::get('/dashboard', 'dashboard')->name('manage.dashboard');

    });

    Route::controller(HomeController::class)->middleware('auth')->group(function () {
        // Route::get('/home/{id}', 'show');
        Route::get('/profile', 'profile')->name('profile');
    });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:superadministrator|administrator|manager']], function () {


    Route::controller(UserController::class)->group(function () {

        Route::get('/user', 'index')->name('user.index');
        Route::post('/user/store', 'store')->name('user.store');
        Route::get('/user/{id}', 'show')->name('user.show');
        Route::put('/user/{id}', 'update')->name('user.update');
        Route::delete('/user/{id}', 'destroy')->name('user.destroy');
   });

    Route::controller(PermissionController::class)->group(function () {

        Route::get('/permission', 'index')->name('permission.index');
        Route::post('/permission/store', 'store')->name('permission.store');
        Route::delete('/permission/{id}', 'destroy')->name('permission.destroy');
    });
    Route::controller(RoleController::class)->group(function () {

        Route::get('/role', 'index')->name('role.index');
        Route::post('/role/store', 'store')->name('role.store');
        Route::get('/role/{id}', 'show')->name('role.show');
        Route::put('/role/{id}', 'update')->name('role.update');
        Route::delete('/role/{id}', 'destroy')->name('role.destroy');
    });
});
