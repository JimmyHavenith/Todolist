<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories', Project::all());
        view()->share('etiquettes', Tag::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
