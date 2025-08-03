<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminCarouselController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AdminKegiatanController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\AdminTentangKamiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AdminKontakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;

// Route untuk autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

// Route untuk mengelola user admin
Route::resource('admin/user', AdminUserController::class)->names([
    'index' => 'admin.user.index',
    'create' => 'admin.user.create',
    'store' => 'admin.user.store',
    'show' => 'admin.user.show',
    'edit' => 'admin.user.edit',
    'update' => 'admin.user.update',
    'destroy' => 'admin.user.destroy',
])->middleware('admin');

// Route untuk halaman utama
Route::get('/', [BerandaController::class, 'index']);

// Route untuk halaman beranda
Route::get('/beranda', [BerandaController::class, 'index']);

// Route untuk Tentang Kami
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami.index');

// Route untuk Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// Route resource untuk admin artikel
Route::resource('admin/artikel', App\Http\Controllers\AdminArtikelController::class)->middleware('admin');

Route::get('/artikel/{id}', [BerandaController::class, 'show'])->name('artikel.show');

// Route resource untuk admin carousel
Route::resource('admin/carousel', AdminCarouselController::class)->middleware('admin');

Route::get('/artikel', [BerandaController::class, 'listArtikel'])->name('artikel.list');

Route::get('/kegiatan', [BerandaController::class, 'listKegiatan'])->name('kegiatan.list');

Route::get('/kegiatan/{id}', [\App\Http\Controllers\BerandaController::class, 'showKegiatan'])->name('kegiatan.show');

Route::resource('admin/kegiatan', AdminKegiatanController::class)->middleware('admin');


Route::get('/galeri/video', [App\Http\Controllers\BerandaController::class, 'galeriVideo'])->name('galeri.video');

Route::resource('admin/galeri-foto', App\Http\Controllers\AdminGaleriFotoController::class)->middleware('admin');

Route::resource('admin/album', App\Http\Controllers\AdminAlbumController::class)->middleware('admin');

Route::get('/galeri/album', [App\Http\Controllers\BerandaController::class, 'albumPublic'])->name('galeri.album');
Route::get('/galeri/album/{album}', [App\Http\Controllers\BerandaController::class, 'albumShowPublic'])->name('galeri.album.show');

Route::resource('admin/video', App\Http\Controllers\AdminVideoController::class)->middleware('admin');

// Route untuk admin Tentang Kami
Route::resource('admin/tentang-kami', AdminTentangKamiController::class)->names([
    'index' => 'admin.tentang-kami.index',
    'create' => 'admin.tentang-kami.create',
    'store' => 'admin.tentang-kami.store',
    'show' => 'admin.tentang-kami.show',
    'edit' => 'admin.tentang-kami.edit',
    'update' => 'admin.tentang-kami.update',
    'destroy' => 'admin.tentang-kami.destroy',
])->middleware('admin');

// Route untuk admin kontak
Route::resource('admin/kontak', AdminKontakController::class)->names([
    'index' => 'admin.kontak.index',
    'create' => 'admin.kontak.create',
    'store' => 'admin.kontak.store',
    'show' => 'admin.kontak.show',
    'edit' => 'admin.kontak.edit',
    'update' => 'admin.kontak.update',
    'destroy' => 'admin.kontak.destroy',
])->middleware('admin');

// Route untuk menandai pesan sebagai dibaca/belum dibaca
Route::patch('admin/kontak/{id}/mark-read', [AdminKontakController::class, 'markAsRead'])->name('admin.kontak.mark-read')->middleware('admin');
Route::patch('admin/kontak/{id}/mark-unread', [AdminKontakController::class, 'markAsUnread'])->name('admin.kontak.mark-unread')->middleware('admin');
