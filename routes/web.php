<?php

use Illuminate\Support\Facades\Route;
// pemanggilan file controller
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\bioskopController;
use App\Http\Controllers\UserController;

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

// Route::httpmethod('/url', [namaController::class, namaFunction])->name('nama_route);
// httpmethod :
// get -> mengambil data
// post -> menambah data
// parch/put -> mengubah data
// delete -> menghapus data
// /url dan name() harus beda/unique

//Route::get('/', [LandingPageController::class, 'index'])->name('home');
// //form
Route::get('/', [UserController::class, 'login'])->name('login');
// //auth
Route::post('/login/auth', [UserController::class, 'loginAuth'])->name('login.auth');
//Logout

Route::middleware(['isLogin'])->group(function () {
    //Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    // url : kebab case, name : snack case, controller&function : camel case
    Route::get('/landing-page', [LandingPageController::class, 'index'])->name('landing-page');

    // mengelola data bioskop
    Route::get('/bioskop', [bioskopController::class, 'index'])->name('bioskop');
    Route::get('/bioskop/add', [bioskopController::class, 'create'])->name('bioskop.add');
    Route::post('/bioskop/add', [bioskopController::class, 'store'])->name('bioskop.add.store');
    // {namaPathDinamis} : path dinamis, yang nilainya akan berubah-ubah (harus diisi ketika mengakses route) -> ketika akses di bladnya menjadi href="{{ route('nama_route', $isiPathDinamis) }}" atau action="{{route('nama_route', $isiPathDinamis)}}"
    //fungsi path dinamis : spesifikasi data yang akan diproses
    Route::delete('/bioskop/{id}', [bioskopController::class, 'destroy'])->name('bioskop.delete');
    // edit pake {id} karna perlu spesifikasi data mana mana yang mau diedit
    Route::get('/bioskop/edit/{id}', [bioskopController::class, 'edit'])->name('bioskop.edit');
    Route::patch('/bioskop/edit/{id}', [bioskopController::class, 'update'])->name('bioskop.edit.update');
    Route::put('/bioskop/update-stock/{id}', [bioskopController::class, 'stockEdit'])->name('bioskop.stock.update');
    //Login
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.add');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.add.store');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('user/edit/{id}', [UserController::class, 'update'])->name('user.edit.update');
});
