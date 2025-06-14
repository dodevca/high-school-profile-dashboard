<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    HomeController,
    GalleryController,
    AchievementController,
    ModulController,
    AnnouncementController,
    EventController,
    NewsController
};

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/sambutan', 'greeting')->name('home.greeting');
    Route::get('/visi-misi', 'vision')->name('home.vision');
    Route::get('/tenaga-pendidik', 'teachers')->name('home.teachers');
    Route::get('/sarana-prasarana', 'infrastructure')->name('home.infrastructure');
});

Route::prefix('galeri')->controller(GalleryController::class)->name('gallery.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
});

Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievement.index');

Route::prefix('modul')->controller(ModulController::class)->name('modul.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{hash}', 'major')->name('major');
});

Route::prefix('pengumuman')->controller(AnnouncementController::class)->name('announcement.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
});

Route::prefix('agenda')->controller(EventController::class)->name('event.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
});

Route::prefix('berita')->controller(NewsController::class)->name('news.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
});