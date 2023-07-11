<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
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


// Route::get('/simpankategori', [KategoriController::class, 'create']);

// Route::get('/User', [UserController::class, 'index']);

// Route::get('/login', [Controller::class, 'index']);

// Route::get('/User/{id}', [UserController::class, 'detail']);

// Route::get("/", [SessionController::class, 'index']);
// Route::post("/", [SessionController::class, 'login']);

//Catatan

//Route Login jika sudah masuk home kembali lagi ke login harus ke log out
// Route::middleware(['guest'])->group(function () {
//     Route::get("/", [SessionController::class, 'index'])->name('login');
//     Route::post("/", [SessionController::class, 'login']);

// });

//Route home
// Route::get('/home', function () {
//     return redirect('/');
// });

//ROUTE UNTUK PENGECEKAN LOGIN MASUK KE USER ATAU ADMIN
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', [UserController::class, 'indexadmin'])->middleware('userAkses:admin');
//     Route::get('/masyarakat', [UserController::class, 'masyarakat'])->middleware('userAkses:masyarakat');
//     Route::get('/User/{id}', [UserController::class, 'detail']);
//      Route::get('/logout', [SessionController::class, 'logout']);
// });


// Route::post('/register',[SignupController::class,'register']);
// Route::get('/register',[SignupController::class,'form'])->name('Login.register');



Route::middleware(['guest'])->group(function () {
    Route::get("/", [SessionController::class, 'index'])->name('login');
    Route::post("/", [SessionController::class, 'login']);
});

//Route home
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return redirect('/');
    });


    Route::middleware('userAkses:masyarakat')->group(function () {

        Route::get('/masyarakat', [UserController::class, 'masyarakat']);
        Route::get('/User/{id}', [UserController::class, 'detail']);
    });

    Route::middleware('userAkses:admin')->group(function () {

        Route::get('/admin', [UserController::class, 'indexadmin']);
        Route::get('/User/{id}', [UserController::class, 'detail']);
    });

    Route::get('/logout', [SessionController::class, 'logout']);
});

Route::get('/register',[SignupController::class,'register']);
Route::post('/register',[SignupController::class,'form']);

Route::post('/register',[SignupController::class,'register']);
Route::get('/register',[SignupController::class,'form'])->name('Login.register');

Route::get('adminbre',function(){
    return view('admin.dashboard');
});

Route::resource("/event", EventController::class);


Route::get('/landing',function(){
    return view('user.navbar');
});

