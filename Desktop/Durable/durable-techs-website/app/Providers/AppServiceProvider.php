<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;

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
     * @return void
     */
    public function boot()
    {
        if (env('REDIRECT_HTTPS')) {
            URL::forceScheme('https');
        }

        $this->loadViewsFrom(resource_path('website/views'), 'website');
		$this->loadViewsFrom(resource_path('admin/views'), 'admin');

        Schema::defaultStringLength(125);

        $this->app->singleton('menus', function () {
            $menus = Menu::with('categories')->get();

            $menuData = [];
            foreach ($menus as $menu) {

                // categories
                $categoryData = [];
                foreach ($menu->categories as $category) {
                    $categoryData[] = [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'thumbnail' => $category->thumbnail,
                    ];
                }

                // menu 
                $menuData[] = [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'categories' => $categoryData,
                ];
            }

            return $menuData;
        });
    }
}
