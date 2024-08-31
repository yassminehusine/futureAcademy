<?php

use  Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UsersController;
use  App\Http\Controllers\departmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\dashboardController; 
use App\Http\Controllers\Auth\PasswordController;

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
});

//strat Home Dashobard
Route::get('/dashboard', [UsersController::class,'main'])->name('dashboard');
//End   Home Dashboard
// Route Departments
Route::group(['prefix'=> 'departments'],function(){
    Route::get('/create',[ departmentController::class,'create'])->name('department.create');
    Route::get('/index', [ departmentController::class, 'index'])->name('department.index');
    Route::post('/store',[ departmentController::class,'store'])->name('department.store');
    Route::get('/edit/{id}',[ departmentController::class,'edit'])->name('department.edit');
    Route::post('/update/{id}',[ departmentController::class,'update'])->name('department.update');
    Route::get('/destroy/{id}', [departmentController::class, 'destroy'])->name('department.destroy');  
});
// End Route Departments 
// Route Users
Route::group(['prefix'=>'users'],function(){
    Route::get('/create',[UsersController::class,'create'])->name('user.create');
    Route::get('/index', [UsersController::class, 'index'])->name('user.index');
    Route::post('/store',[UsersController::class,'store'])->name('user.store');
    Route::get('/edit/{id}',[UsersController::class,'edit'])->name('user.edit');
    Route::post('/update/{id}',[UsersController::class,'update'])->name('user.update');
    Route::get('/destroy/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('/profile/{id}',[UsersController::class,'show'])->name('user.profile'); 
})->middleware('auth');


// End Rout Usres
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
//     Route::post('register', [AdminRegisterController::class, 'register']);
// });
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');