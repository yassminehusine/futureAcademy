<?php
use App\Http\Controllers\user_coursesController;
use  Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UsersController;
use  App\Http\Controllers\departmentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\materialController;

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
})->middleware('auth');
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
// Start Courses Controller
Route::group(['prefix'=>'courses'],function(){
    Route::get('/create',[CoursesController::class,'create'])->name('course.create');
    Route::get('/index', [CoursesController::class, 'index'])->name('course.index');
    Route::post('/store',[CoursesController::class,'store'])->name('course.store');
    Route::get('/edit/{id}',[CoursesController::class,'edit'])->name('course.edit');
    Route::post('/update/{id}',[CoursesController::class,'update'])->name('course.update');
    Route::get('/destroy/{id}', [CoursesController::class, 'destroy'])->name('course.destroy');
})->middleware('auth');
// End Courses Controller

// Corrected routes/web.php
Route::group(['prefix'=>'user_courses'],function(){
    Route::get('/create',[user_coursesController::class,'create'])->name('user_course.create');
    Route::get('/index', [user_coursesController::class, 'index'])->name('user_course.index');
    Route::post('/store',[user_coursesController::class,'store'])->name('user_course.store');
    Route::get('/edit/{id}',[user_coursesController::class,'edit'])->name('user_course.edit');
    Route::post('/update/{id}',[user_coursesController::class,'update'])->name('user_course.update');
    Route::get('/destroy/{id}', [user_coursesController::class, 'destroy'])->name('user_course.destroy');
})->middleware('auth');
// Corrected routes/web.php
// Start materials Controller
Route::group(['prefix'=>'materials'],function(){
    Route::get('/create',[materialController::class,'create'])->name('material.create');
    Route::get('/index', [materialController::class, 'index'])->name('material.index');
    Route::post('/store',[materialController::class,'store'])->name('material.store');
    Route::get('/edit/{id}',[materialController::class,'edit'])->name('material.edit');
    Route::post('/update/{id}',[materialController::class,'update'])->name('material.update');
    Route::get('/destroy/{id}', [materialController::class, 'destroy'])->name('material.destroy');
})->middleware('auth');
// End materials Controller
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
