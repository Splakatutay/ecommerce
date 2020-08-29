<?php

namespace Rcborinaga\Ecommerce;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webwizo\Shortcodes\ShortcodesServiceProvider as Shorcode;

class ECommerceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();

        if ($this->app->runningInConsole()) {

            if (! class_exists('CreateProductsTable')) {
                
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_products_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_products_table.php'),
                ], 'migrations');

            }

        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/ecommerce'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config'    => config_path('/')
        ], 'config');

        
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'../../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'middleware' => ['web'],
        ];
    }

}
