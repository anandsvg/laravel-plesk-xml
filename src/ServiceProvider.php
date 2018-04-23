<?php

namespace nickurt\PleskXml;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nickurt\PleskXml\Plesk', function ($app) {
            $plesk = new Plesk($app);
            $plesk->server($plesk->getDefaultServer());

            return $plesk;
        });

        $this->app->alias('nickurt\PleskXml\Plesk', 'PleskXml');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../src/Resources/Lang', 'plesk-xml');

        $this->publishes([
            __DIR__.'/../src/Resources/Lang' => resource_path('lang/vendor/plesk-xml'),
        ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['nickurt\Plesk\PleskXml', 'PleskXml'];
    }
}