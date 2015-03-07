<?php namespace Uninett\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceBindingServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $bindings = $this->app['config']->get('uninett.bindings');

        foreach($bindings as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}