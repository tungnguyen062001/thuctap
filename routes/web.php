<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
Route::get('/', function () {
    return view('admin/login');
});

Route::get('admin/login',function(){
    return view('admin.login');
});

Route::post('/admin/login',[AdminController::class,'Login']);
Route::post('/admin/logout',[AdminController::class,'Logout']);

Route::get('admin/home',function(){
    return view("admin/home");
// })->middleware('auth.admin');
});

Route::get('book/list',[BookController::class,'getAll_book']);
Route::post('book/them',[BookController::class,'them_book']);
Route::get('book/them',[BookController::class,'get_data']);
Route::get('book/sua{id}',[BookController::class,'hienthi_book']);
Route::post('book/sua{id}',[BookController::class,'sua_book']);
Route::get('book/xoa{id}',[BookController::class,'xoa_book']);
