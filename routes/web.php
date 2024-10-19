<?php
use App\Http\Controllers\user_coursesController;
use  Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UsersController;
use  App\Http\Controllers\departmentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\materialController;
use App\Http\Controllers\assignmentController;
use App\Http\Controllers\submissionController;
use App\Http\Controllers\postController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\FooterController;

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
    Route::get('/settings/{id}',[UsersController::class,'settings'])->name('user.settings'); 
    Route::get('/search', [UsersController::class, 'search'])->name('users.search');


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
    Route::get('/show/{id}', [user_coursesController::class, 'show'])->name('user.courses');

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
    Route::get('/show/{id}', [materialController::class, 'show'])->name('material.show');
    Route::get('/download/{filename}', [materialController::class, 'download'])->name('download');


})->middleware('auth');
// End materials Controller




// Start assignments Controller
Route::group(['prefix'=>'assignments'],function(){
    Route::get('/create/{id}',[assignmentController::class,'create'])->name('assignment.create');
    Route::get('/index', [assignmentController::class, 'index'])->name('assignment.index');
    Route::post('/store',[assignmentController::class,'store'])->name('assignment.store');
    Route::get('/edit/{id}',[assignmentController::class,'edit'])->name('assignment.edit');
    Route::post('/update/{id}',[assignmentController::class,'update'])->name('assignment.update');
    Route::get('/show/{id}',[assignmentController::class,'show'])->name('assignment.show');
    Route::get('/destroy/{id}', [assignmentController::class, 'destroy'])->name('assignment.destroy');
})->middleware('auth');
// End assignments Controller

// Route posts
Route::group(['prefix'=> 'posts'],function(){
    Route::get('/create',[ postController::class,'create'])->name('post.create');
    Route::get('/index', [ postController::class, 'index'])->name('post.index');
    Route::post('/store',[ postController::class,'store'])->name('post.store');
    Route::get('/edit/{id}',[ postController::class,'edit'])->name('post.edit');
    Route::post('/update/{id}',[ postController::class,'update'])->name('post.update');
    Route::get('/destroy/{id}', [postController::class, 'destroy'])->name('post.destroy');  
})->middleware('auth');
// End Route posts 


// Start submissions Controller
Route::group(['prefix'=>'submissions'],function(){
    Route::get('/create/{id}',[submissionController::class,'create'])->name('submission.create');
    Route::get('/index', [submissionController::class, 'index'])->name('submission.index');
    Route::post('/store/{id}',[submissionController::class,'store'])->name('submission.store');
    Route::get('/edit/{id}',[submissionController::class,'edit'])->name('submission.edit');
    Route::post('/update/{id}',[submissionController::class,'update'])->name('submission.update');
    Route::get('/destroy/{id}', [submissionController::class, 'destroy'])->name('submission.destroy');
    Route::get('/show', [submissionController::class, 'show'])->name('submission.show');

})->middleware('auth');
// End submissions Controller











//front routes 



// Start navbar Controller
Route::group(['prefix'=>'navbar'],function(){
    Route::get('/create',[navbarController::class,'create'])->name('navbar.create');
    Route::get('/index', [navbarController::class, 'index'])->name('navbar.index');
    Route::get('/edit/{id}',[navbarController::class,'edit'])->name('navbar.edit');
    Route::post('/update/{id}',[navbarController::class,'update'])->name('navbar.update');
    Route::get('/destroy/{id}', [navbarController::class, 'destroy'])->name('navbar.destroy');
})->middleware('auth');
// End navbar Controller


// Start slider Controller
Route::group(['prefix'=>'slider'],function(){
    Route::get('/create',[sliderController::class,'create'])->name('slider.create');
    Route::get('/index', [sliderController::class, 'index'])->name('slider.index');
    Route::get('/edit/{id}',[sliderController::class,'edit'])->name('slider.edit');
    Route::post('/update/{id}',[sliderController::class,'update'])->name('slider.update');
    Route::get('/destroy/{id}', [sliderController::class, 'destroy'])->name('slider.destroy');
})->middleware('auth');
// End slider Controller


// Start header Controller
Route::group(['prefix'=>'header'],function(){
    Route::get('/create',[headerController::class,'create'])->name('header.create');
    Route::get('/index', [headerController::class, 'index'])->name('header.index');
    Route::get('/edit/{id}',[headerController::class,'edit'])->name('header.edit');
    Route::post('/update/{id}',[headerController::class,'update'])->name('header.update');
    Route::get('/destroy/{id}', [headerController::class, 'destroy'])->name('header.destroy');
})->middleware('auth');
// End header Controller



// Start footer Controller
Route::group(['prefix'=>'footer'],function(){
    Route::get('/create',[footerController::class,'create'])->name('footer.create');
    Route::get('/index', [footerController::class, 'index'])->name('footer.index');
    Route::get('/edit/{id}',[footerController::class,'edit'])->name('footer.edit');
    Route::post('/update/{id}',[footerController::class,'update'])->name('footer.update');
    Route::get('/destroy/{id}', [footerController::class, 'destroy'])->name('footer.destroy');
})->middleware('auth');
// End footer Controller




Route::get('/notifications/{id}', function () {

    $notifications = auth()->user()->notifications;

       // dd($notifications);
    foreach ($notifications as $notification) {

        $notificationData = $notification->toDatabase($notification->notifiable);

        $title = $notificationData['title'];
        $body = $notificationData['body'];

    }

    return view('admin.notifications.show',compact(['notifications','title','body']));
    })->name('admin.notifications.show');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
