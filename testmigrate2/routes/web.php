<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PemesananController;
use App\Models\Kategori;
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


//Route::middleware(['guest'])->group(function () {
    Route::get("/", [SessionController::class, 'index'])->name('login');
    Route::post("/", [SessionController::class, 'login']);
//});

//Route home
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return redirect('/');
    });


    //Route::middleware('userAkses:masyarakat')->group(function () {
        Route::get('/masyarakat', [UserController::class, 'masyarakat'])->name('masyarakat.index');
        Route::get('/pemesanan/{id}',[PemesananController::class,'create'])->name('pemesanan.create');
        Route::post('/pemesanan/{id}',[PemesananController::class,'store'])->name('pemesanan.store');
        Route::get('/masyarakat/{id}', [UserController::class, 'detail'])->name('masyarakat.detail');
    //});

    //Route::middleware('userAkses:admin')->group(function () {
        Route::get('/admin', [UserController::class, 'indexadmin']);
        Route::get('/admin/{id}', [UserController::class, 'detail'])->name('admin.detail');
    //});


    Route::get('/logout', [SessionController::class, 'logout']);
});


// Register
Route::post('/register',[SignupController::class,'register']);
Route::get('/register',[SignupController::class,'form'])->name('Login.register');




//================================================  ADMIN   ============================================================

//======= ADMIN DASHBOARD =====================
Route::get('/admin', [UserController::class, 'indexadmin'])->name('admin.index');


//======= ADMIN MENU ==========================


//ADMIN USER

Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/admin/{id}', [UserController::class, 'detail'])->name('user.detail');

// ADMIN EVENT

//READ EVENT ( TABEL EVENT )
Route::get('/events', [EventController::class, 'index'])->name('events.index'); // VALID

//CREATE EVENT
Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); //VALID
Route::post('/events/create', [EventController::class, 'store'])->name('events.store'); //VALID


//SHOW EVENT
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');  //VALID

//DELETE
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy'); //VALID

//UPDATE/ EDIT EVENT
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit'); // TINGGAL GAMBAR
Route::put('/events/{id}/edit', [EventController::class, 'update'])->name('events.update');




// ADMIN KATEGORI

// READ tabel kategori
Route::get('/kategori',[KategoriController::class,'index'])->name('kategori.index'); //valid

// CREATE KATEGORI
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create'); //valid
Route::post('/kategori/create', [KategoriController::class, 'store'])->name('kategori.store'); //valid

//SHOW KATEGORI
Route::get('/kategori/{id}/show',[KategoriController::class,'show'])->name('kategori.show'); //valid

//UPDATE KATEGORI
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit'); //valid
Route::put('/kategori/{id}/edit', [KategoriController::class, 'update'])->name('kategori.update'); //valid

//DELETE KATEGORI
Route::delete('/Kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy'); //VALID


// ADMIN PEMESANAN
Route::get('/pemesanan',[PemesananController::class,'indexAdmin'])->name('pemesanan.admin');


//============================= MASYARAKAT LUR =========================================================================

//TES PEMESANAN MASYARAKAT
//Pemesanan Event
Route::get('/pemesanan/{id}', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan/{id}', [PemesananController::class, 'store'])->name('pemesanan.store');

//Lengkapi Data
Route::get('/pemesanan/{id}/user', [PemesananController::class, 'createUser'])->name('pemesanan.create2');
Route::post('/pemesanan/{id}/user', [PemesananController::class, 'store2'])->name('pemesanan.store2');


//RIWAYAT PEMESANAN
Route::get('/riwayat',[PemesananController::class,'index'])->name('pemesanan.riwayat');

//Profile
Route::get('/profile',[UserController::class,'profile'])->name('profile.index');
Route::get('/profile/{id}/edit',[UserController::class,'edit'])->name('profile.edit');
Route::put('/profile/{id}/edit',[UserController::class,'update'])->name('profile.update');


