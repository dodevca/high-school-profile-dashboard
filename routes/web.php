<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Public\{
    HomeController as PublicHome,
    NewsController as PublicNews,
    AnnouncementController as PublicAnnouncement,
    EventController as PublicEvent,
    ModuleController as PublicModule,
    AchievementController as PublicAchievement,
    TeacherController as PublicTeacher,
    GalleryController as PublicGallery,
    GreetingController as PublicGreeting,
    InformationController as PublicInformation,
};
use App\Http\Controllers\Admin\{
    HomeController as AdminHome,
    ProfileController as AdminProfile,
    NewsController as AdminNews,
    AnnouncementController as AdminAnnouncement,
    EventController as AdminEvent,
    ModuleController as AdminModule,
    AchievementController as AdminAchievement,
    TeacherController as AdminTeacher,
    GalleryController as AdminGallery,
    MajorController as AdminMajor,
    GreetingController as AdminGreeting,
    InformationController as AdminInformation,
};
use App\Http\Controllers\Api\Admin\{
    NewsController as ApiAdminNews,
    AnnouncementController as ApiAdminAnnouncement,
    EventController as ApiAdminEvent,
    ModuleController as ApiAdminModule,
    AchievementController as ApiAdminAchievement,
    TeacherController as ApiAdminTeacher,
    GalleryController as ApiAdminGallery,
    GreetingController as ApiAdminGreeting,
    InformationController as ApiAdminInformation,
};

// Guest Routes
Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.attempt');
});

Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Public Routes
Route::get('/', [PublicHome::class, 'index'])->name('home');

Route::prefix('berita')->name('news.')->controller(PublicNews::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}-{hash}', 'view')->whereNumber('id')->name('view');
});

Route::prefix('pengumuman')->name('announcement.')->controller(PublicAnnouncement::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}-{hash}', 'view')->whereNumber('id')->name('view');
});

Route::prefix('agenda')->name('event.')->controller(PublicEvent::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}-{hash}', 'view')->whereNumber('id')->name('view');
});

Route::prefix('modul')->name('module.')->controller(PublicModule::class)->group(function () {
    Route::get('/{hash}', 'index')->where('hash', '[0-9A-Za-z\-]+')->name('index');
    Route::get('/{hash}/{id}', 'view')->where('hash', '[0-9A-Za-z\-]+')->whereNumber('id')->name('view');
});

Route::get('/prestasi', [PublicAchievement::class, 'index'])->name('achievement');

Route::get('/guru', [PublicTeacher::class, 'index'])->name('teacher');

Route::prefix('galeri')->name('gallery.')->controller(PublicGallery::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}-{hash}', 'view')->whereNumber('id')->name('view');
});

Route::get('/sambutan', [PublicGreeting::class, 'index'])->name('greeting');

Route::get('/informasi', [PublicInformation::class, 'index'])->name('information');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth') ->group(function () {
    Route::get('/', [AdminHome::class, 'index'])->name('home');

    Route::controller(AdminProfile::class)->prefix('profil')->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('password', 'updatePassword')->name('password');
    });

    Route::controller(AdminNews::class)->prefix('berita')->name('news.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminAnnouncement::class)->prefix('pengumuman')->name('announcement.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminEvent::class)->prefix('agenda')->name('event.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminModule::class)->prefix('modul')->name('module.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminAchievement::class)->prefix('prestasi')->name('achievement.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminTeacher::class)->prefix('guru')->name('teacher.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminGallery::class)->prefix('galeri')->name('gallery.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminMajor::class)->prefix('jurusan')->name('major.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('tambah', 'add')->name('add');
        Route::get('{id}', 'edit')->whereNumber('id')->name('edit');
    });

    Route::controller(AdminGreeting::class)->prefix('sambutan')->name('greeting.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(AdminInformation::class)->prefix('informasi')->name('information.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

// Admin API Routes
Route::middleware('api')->prefix('api/admin')->name('api.admin.')->middleware('auth') ->group(function () {
    Route::apiResource('news', ApiAdminNews::class);
    Route::apiResource('announcement', ApiAdminAnnouncement::class);
    Route::apiResource('event', ApiAdminEvent::class);
    Route::apiResource('module', ApiAdminModule::class);
    Route::apiResource('achievement', ApiAdminAchievement::class);
    Route::apiResource('teacher', ApiAdminTeacher::class);
    Route::apiResource('gallery', ApiAdminGallery::class);
    Route::delete('gallery/{gallery}/{image}', [ApiAdminGallery::class, 'destroyImage'])->name('gallery.images.destroy');
    Route::apiResource('greeting', ApiAdminGreeting::class);
    Route::apiResource('information', ApiAdminInformation::class);
});