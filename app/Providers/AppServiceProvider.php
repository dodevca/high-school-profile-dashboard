<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Information;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $info = Information::first();

        View::share('school', (object) [
            'name'    => $info->name,
            'logo'    => $info->logo,
            'address' => $info->address,
            'email'   => $info->email,
            'phone'   => $info->phone,
        ]);

        View::composer('admin.*', function($view){
            $view->with('user', Auth::user());
        });
    }
}
