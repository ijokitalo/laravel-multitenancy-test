<?php

namespace App\Providers;

use App\Contracts\Bar;
use App\Contracts\Foo;
use App\Contracts\FooBarContract;
use Illuminate\Support\Facades\Event;
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
    Event::listen(\Spatie\Multitenancy\Events\MadeTenantCurrentEvent::class, function($event) {
      $this->app->singleton(FooBarContract::class, function ($app) {
        if (app('currentTenant')->name === 'foo') {
          return new Foo();
        } else {
          return new Bar();
        }
      });
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
