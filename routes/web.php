<?php

use App\Http\Controllers\Admin\{AuthController, ProfileController, UserController};
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepObatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Models\Dokter;
use App\Models\RekamMedis;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(PasienController::class)->prefix('pasien')->group(function () {
    Route::get('', 'index')->name('pasien');
});
Route::get('/pasien/create', [PasienController::class, 'create']);
Route::post('/pasien', [PasienController::class, 'store'])->name('simpanPasien');
Route::post('/updatePasien', [PasienController::class, 'update'])->name('updatePasien');
Route::delete('/pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');

Route::controller(DokterController::class)->prefix('dokter')->group(function () {
    Route::get('', 'index')->name('dokter');
});
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::post('/updateDokter', [DokterController::class, 'update'])->name('updateDokter');
Route::delete('/dokter/{dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');


Route::middleware(['auth'])->group(function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('simpanObat');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('updateObat');
    Route::delete('/obat/{obat}', [ObatController::class, 'destroy'])->name('deleteObat');
});

Route::controller(RekamMedisController::class)->prefix('rekammedis')->group(function () {
    Route::get('', 'index')->name('rekammedis');
});

Route::get('/rekammedis/create', [RekamMedisController::class, 'create']);
Route::post('/rekammedis', [RekamMedisController::class, 'store'])->name('simpanrekammedis');
Route::get('/rekammedis/detail_rm/{id}', [RekamMedisController::class, 'detail'])->name('detail_rm');
Route::post('/rekammedis/tambah_rm', [RekamMedisController::class, 'tambah_rm'])->name('tambah_rm');
Route::delete('/rekammedis/a/{rekammedis}', [RekamMedisController::class, 'destroyNoRM'])->name('rekammedis.destroyNoRM');
Route::delete('/rekammedis/{rekammedis}', [RekamMedisController::class, 'destroy'])->name('rekammedis.destroy');
Route::get('/cetak/rekammedis/{id}', [PDFController::class, 'generatePDF'])->name('rekammedis.cetak');


Route::middleware(['auth'])->group(function () {
    Route::get('/resepobat', [ResepObatController::class, 'index'])->name('resepobat.index');
    Route::put('/resepobat/selesai/{id}', [ResepObatController::class, 'selesai'])->name('resepobat.selesai');
});

Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::group(['middleware' => ['admin_auth']], function () {

    Route::get('/admin/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/admin/logout', [ProfileController::class, 'logout'])->name('logout');
});






Auth::routes();
