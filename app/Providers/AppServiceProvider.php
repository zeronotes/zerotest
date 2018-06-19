<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
// use App\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // $product_categories = ProductCategory::all();
        //dd($product_categories);
        // View::share('product_categories', $product_categories);

        // hien thi cac query
        // DB::listen(function ($query) {
        //     var_dump([
        //         $query->sql,
        //         $query->bindings,
        //         $query->time
        //     ]);
        // });
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
