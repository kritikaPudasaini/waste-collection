<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EsewaController;


route::get('/',[HomeController::class,'home'])->name('home');
route::get('/aboutus',[HomeController::class, 'about']);
route::get('/support',[HomeController::class, 'support']);

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

route::get('/dashboard',[HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

//category routes
route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);
route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);
route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

//product routes
route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);
route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

//user routes
route::get('view_user',[AdminController::class,'view_user'])->middleware(['auth','admin']);
route::post('add_user',[AdminController::class,'add_user'])->middleware(['auth','admin']);
route::get('edit_user/{id}',[AdminController::class,'edit_user'])->middleware(['auth','admin']);
route::post('update_user/{id}',[AdminController::class,'update_user'])->middleware(['auth','admin']);
route::get('delete_user/{id}',[AdminController::class,'delete_user'])->middleware(['auth','admin']);

//role routes
route::get('view_role',[AdminController::class,'view_role'])->middleware(['auth','admin']);
route::post('add_role',[AdminController::class,'add_role'])->middleware(['auth','admin']);
route::get('edit_role/{id}',[AdminController::class,'edit_role'])->middleware(['auth','admin']);
route::post('update_role/{id}',[AdminController::class,'update_role'])->middleware(['auth','admin']);
route::get('delete_role/{id}',[AdminController::class,'delete_role'])->middleware(['auth','admin']);

//payments routes
route::get('view_payment',[AdminController::class,'view_payment'])->middleware(['auth','admin']);
route::post('add_payment',[AdminController::class,'add_payment'])->middleware(['auth','admin']);


//areas routes
route::get('view_area',[AdminController::class,'view_area'])->middleware(['auth','admin']);
route::post('add_area',[AdminController::class,'add_area'])->middleware(['auth','admin']);
route::get('edit_area/{id}',[AdminController::class,'edit_area'])->middleware(['auth','admin']);
route::post('update_area/{id}',[AdminController::class,'update_area'])->middleware(['auth','admin']);
route::get('delete_area/{id}',[AdminController::class,'delete_area'])->middleware(['auth','admin']);

//schedule routes
route::get('view_schedule',[AdminController::class,'view_schedule'])->middleware(['auth','admin']);
route::post('add_schedule',[AdminController::class,'add_schedule'])->middleware(['auth','admin']);
route::get('edit_schedule/{id}',[AdminController::class,'edit_schedule'])->middleware(['auth','admin']);
route::post('update_schedule/{id}',[AdminController::class,'update_schedule'])->middleware(['auth','admin']);
route::get('delete_schedule/{id}',[AdminController::class,'delete_schedule'])->middleware(['auth','admin']);

//search route
route::get('schedule_search',[AdminController::class,'schedule_search'])->middleware(['auth','admin']);

//payment routes
Route::get('view_payments', [AdminController::class, 'index'])->name('payments.index')->middleware(['auth','admin']);
route::get('payments/create', [AdminController::class, 'create'])->name('payments.create')->middleware(['auth','admin']);
route::post('payments', [AdminController::class, 'store'])->name('payments.store')->middleware(['auth','admin']);
route::get('edit_payment/{id}',[AdminController::class,'edit_payment'])->middleware(['auth','admin']);
route::post('update_payment/{id}',[AdminController::class,'update_payment'])->middleware(['auth','admin']);
route::get('delete_payment/{id}',[AdminController::class,'delete_payment'])->middleware(['auth','admin']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('users/{user}/admin-payments', [AdminController::class, 'userPayments'])->name('users.payments.admin');
    Route::get('users/{user}/user-payments', [AdminController::class, 'myPayments'])->name('users.payments.user');
});

// This route will be intercepted by the middleware and redirected accordingly.
Route::get('users/{user}/payments', function() {
})->middleware(['auth', 'check.role']);

//Esewa Routes
// route::get('payments/{payment}', [EsewaController::class, 'show'])->name('payments.show')->middleware(['auth','admin']);
route::post('/esewa/{payment}/pay', [EsewaController::class, 'esewaPay'])->name('esewa')->middleware(['auth','admin']);
route::get('/esewa/success', [EsewaController::class, 'esewaPaySuccess'])->name('success')->middleware(['auth','admin']);
route::get('/esewa/failure', [EsewaController::class, 'esewaPayFailed'])->name('success')->middleware(['auth','admin']);

//Feedback Routes
route::get('/showcomments', [AdminController::class, 'feedback'])->name('comments.show')->middleware(['auth','admin']);
route::get('/comments', [AdminController::class, 'createfeedaback'])->name('comments.create');
route::post('/comments', [AdminController::class, 'storefeedback'])->name('comments.store');

//User Dashboard Routes
route::post('esewa/{payment}/pay', [EsewaController::class, 'esewauserPay'])->name('esewa')->middleware(['auth','verified']);
route::get('/success', [EsewaController::class, 'esewauserPaySuccess'])->name('success')->middleware(['auth','verified']);
route::get('/failure', [EsewaController::class, 'esewauserPayFailed'])->name('success')->middleware(['auth','verified']);

//User Schedule Routes
route::get('user/schedules', [AdminController::class, 'userSchedules'])->name('user.schedules')->middleware('auth','verified');

//Driver Schedule Routes
route::get('driver/schedules', [AdminController::class, 'driverSchedules'])->name('driver.schedules')->middleware('auth','verified');
route::get('edit_driverschedule/{id}',[AdminController::class,'edit_driverschedule'])->name('driver.editschedules')->middleware(['auth','verified']);
route::post('update_driverschedule/{id}',[AdminController::class,'update_driverschedule'])->name('driver.updateschedules')->middleware(['auth','verified']);