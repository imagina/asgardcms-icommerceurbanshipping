<?php

namespace Modules\Icommerceurbanshipping\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Icommerceurbanshipping\Events\Handlers\RegisterIcommerceurbanshippingSidebar;

class IcommerceurbanshippingServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcommerceurbanshippingSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('icommerceurbanshippings', array_dot(trans('icommerceurbanshipping::icommerceurbanshippings')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('icommerceurbanshipping', 'permissions');
        $this->publishConfig('icommerceurbanshipping', 'config');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Icommerceurbanshipping\Repositories\IcommerceurbanshippingRepository',
            function () {
                $repository = new \Modules\Icommerceurbanshipping\Repositories\Eloquent\EloquentIcommerceurbanshippingRepository(new \Modules\Icommerceurbanshipping\Entities\Icommerceurbanshipping());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icommerceurbanshipping\Repositories\Cache\CacheIcommerceurbanshippingDecorator($repository);
            }
        );
  
      $this->app->bind(
        'Modules\Icommerceurbanshipping\Repositories\MapAreaRepository',
        function () {
          $repository = new \Modules\Icommerceurbanshipping\Repositories\Eloquent\EloquentMapAreaRepository(new \Modules\Icommerceurbanshipping\Entities\MapArea());
      
          if (! config('app.cache')) {
            return $repository;
          }
      
          return new \Modules\Icommerceurbanshipping\Repositories\Cache\CacheMapAreaDecorator($repository);
        }
      );

// add bindings

    }
}
