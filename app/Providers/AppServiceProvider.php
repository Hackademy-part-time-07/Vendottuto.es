<?php

namespace App\Providers;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        try{
            $categories= Category::all();
            View::share('categories', $categories);
        } catch(\Throwable $th){
            dump("ALERT: Recuerda lanzar las migrations cuando acabes el clone");
        }
        Paginator::useBootstrapFive();
    }
   
}
