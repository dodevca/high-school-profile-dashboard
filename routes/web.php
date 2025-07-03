<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\{
    HomeController as PublicHome,
    // GalleryController as PublicGallery,
    // AchievementController as PublicAchievement,
    // ModulController as PublicModul,
    // AnnouncementController as PublicAnnouncement,
    // EventController as PublicEvent,
    // NewsController as PublicNews
};
use App\Http\Controllers\Admin\{
    HomeController as AdminHome,
    ProfileController as AdminProfile,
    NewsController as AdminNews,
    AnnouncementController as AdminAnnouncement,
    EventController as AdminEvent,
    ModulController as AdminModul,
    AchievementController as AdminAchievement,
    TeacherController as AdminTeacher,
    GalleryController as AdminGallery,
    MajorController as AdminMajor,
    GreetingController as AdminGreeting,
    InformationController as AdminInformation
};
use App\Http\Controllers\Api\Admin\{
    InformationController as ApiAdminInformation
};

// Public Routes
Route::controller(PublicHome::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    // Route::get('/sambutan', 'greeting')->name('home.greeting');
    // Route::get('/visi-misi', 'vision')->name('home.vision');
    // Route::get('/tenaga-pendidik', 'teachers')->name('home.teachers');
    // Route::get('/sarana-prasarana', 'infrastructure')->name('home.infrastructure');
});

// Route::prefix('galeri')->name('gallery.')->controller(PublicGallery::class)->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
// });

// Route::get('/prestasi', [PublicAchievement::class, 'index'])->name('achievement.index');

// Route::prefix('modul')->name('modul.')->controller(PublicModul::class)->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/{hash}', 'major')->name('major');
// });

// Route::prefix('pengumuman')->name('announcement.')->controller(PublicAnnouncement::class)->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
// });

// Route::prefix('agenda')->name('event.')->controller(PublicEvent::class)->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
// });

// Route::prefix('berita')->name('news.')->controller(PublicNews::class)->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/{id}/{hash}', 'view')->whereNumber('id')->name('view');
// });

// Admin Web Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHome::class, 'index'])->name('home');

    Route::controller(AdminProfile::class)->prefix('profil')->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(AdminNews::class)->prefix('berita')->name('news.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminAnnouncement::class)->prefix('pengumuman')->name('announcement.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminEvent::class)->prefix('agenda')->name('event.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminModul::class)->prefix('modul')->name('modul.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{hash}', 'edit')->name('edit');
    });

    Route::controller(AdminAchievement::class)->prefix('prestasi')->name('achievement.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{hash}', 'edit')->name('edit');
    });

    Route::controller(AdminTeacher::class)->prefix('guru')->name('teacher.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminGallery::class)->prefix('galeri')->name('gallery.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('tambah', 'add')->name('add');
        // Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminMajor::class)->prefix('jurusan')->name('major.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(AdminGreeting::class)->prefix('sambutan')->name('greeting.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(AdminInformation::class)->prefix('informasi')->name('information.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

// API Routes
Route::middleware('api')->prefix('api/admin')->name('api.admin.')->group(function () {
    Route::post('infromation/{id}', [ApiAdminInformation::class, 'update'])->name('information.update');
});