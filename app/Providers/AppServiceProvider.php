<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

     /**
     * Bootstrap any application services.
     *
     * This method is used to perform actions after all other service providers have been registered.
     * It is typically used for tasks like event listeners, route definitions, or view composers.
     *
     * @return void
     */
    public function boot()
    {
        // Register a view composer for all views
        view()->composer('*', function ($view) {

            // Fetch all categories from the database
            $categories = Category::all();

            // Share the 'categories' variable with all views
            $view->with('categories', $categories);
        });
    }
}
