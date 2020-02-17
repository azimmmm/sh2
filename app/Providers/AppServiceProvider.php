<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
//inside AppServiceProvider register method:

        view()->composer('viewfrontend.layouts.master', function ($view) {
            //get all parent categories with their subcategories
            $categories = \App\Category::where('parent_id', null)->with('childRecursive')->get();
            $brands=\App\Brand::all();
            //attach the categories to the view.
            $view->with(compact(['categories','brands']));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);



    }
}
