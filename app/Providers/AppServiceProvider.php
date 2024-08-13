<?php

namespace App\Providers;

use App\Models\Brand;
use Livewire\Livewire;
use App\Observers\BrandObserver;
use Illuminate\Support\ServiceProvider;

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
        Brand::observe(BrandObserver::class);
        Livewire::component('theme-toggle', \App\Http\Livewire\ThemeToggle::class);
    }
}
