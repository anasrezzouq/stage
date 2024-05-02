<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Doccontroller;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/home',[Homecontroller::class,'redirect'])->middleware('auth','verified');
Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/showappointment',[AdminController::class,'showappointmentt']);

//doctor//
Route::get('/doctor/showappointment', [Doccontroller::class,'showappointment'])->name('doctor.showappointment');
Route::get('/admin/showappointment', [AdminController::class,'showappointment'])->name('admin.showappointment');
Route::get('/home', [Homecontroller::class, 'redirect'])->name('admin.home');
Route::get('/home', [Homecontroller::class, 'redirect'])->name('doctor.home');


Route::middleware(['auth'])->group(function () {
    Route::get('/showappointment', [Doccontroller::class, 'showappointment'])->name('showappointment');
    Route::get('/approved/{id}', [Doccontroller::class, 'approved'])->name('approved');
    Route::get('/canceled/{id}', [Doccontroller::class, 'canceled'])->name('canceled');
    // Route::get('/showdoctor', [Doccontroller::class, 'showdoctor'])->name('showdoctor');
});



Route::get('/approved/{id}',[AdminController::class,'approved']);

Route::get('/canceled/{id}',[AdminController::class,'canceled']);

Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);

Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);

Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);

Route::get('/emailview/{id}',[AdminController::class,'emailview']);

Route::post('/sendmail/{id}',[AdminController::class,'sendemail']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/') ;
})->name('logout');
Route::get('/',[HomeController::class,'index']);
Route::get('/about', function () {
    return view('user.about');
})->name('about');


Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin.home');



