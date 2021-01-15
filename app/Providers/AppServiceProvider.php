<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() 
    /*https://dcblog.dev/laravel-55-change-public-to-public-html
    https://rimorsoft.com/instalar-laravel-5-x-en-hosting-compartido
    https://www.nigmacode.com/laravel/Subir-proyecto-laravel-a-hosting*/
    {
        $this->app->bind('path.public', function () {
            return base_path().'/public_html';
            /*return'/home/appetcl2/public_html';*/
            /*return base_path().'/../public_html';*/
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
