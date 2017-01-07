<?php

namespace Laravolt\Flash;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Laravolt\Ui
 * @see http://laravel.com/docs/master/packages#service-providers
 * @see http://laravel.com/docs/master/providers
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @see http://laravel.com/docs/master/providers#deferred-providers
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @see http://laravel.com/docs/master/providers#the-register-method
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravolt.flash', function(Application $app){
            return $app->make(Flash::class);
        });
        $this->app->singleton('laravolt.flash.middleware', function(Application $app){
            return new FlashMiddleware($app['laravolt.flash']);
        });
    }

    /**
     * Application is booting
     *
     * @see http://laravel.com/docs/master/providers#the-boot-method
     * @return void
     */
    public function boot()
    {
        $this->registerViews();

        if (!$this->app->runningInConsole()) {
            $this->registerMiddleware();
        }
    }

    /**
     * Register the package views
     *
     * @see http://laravel.com/docs/master/packages#views
     * @return void
     */
    protected function registerViews()
    {
        // register views within the application with the set namespace
        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'flash');

        // allow views to be published to the storage directory
        $this->publishes([
            realpath(__DIR__.'/../resources/views') => base_path('resources/views/vendor/flash'),
        ], 'views');
    }

    protected function registerMiddleware()
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($this->app['laravolt.flash.middleware']);
    }
}
