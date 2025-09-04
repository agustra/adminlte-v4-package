<?php

namespace AgusUsk\AdminLte\Providers;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Route;
use AgusUsk\AdminLte\Console\Commands\PublishAssetsCommand;

class AdminLteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('adminlte')
            ->hasViews()
            ->hasCommand(PublishAssetsCommand::class);
    }

    public function packageBooted()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'adminlte');
        
        // Auto register routes
        Route::group(['namespace' => 'AgusUsk\AdminLte\Http\Controllers'], function () {
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
            
            // Example pages
            Route::get('/examples/login', 'ExampleController@loginPage')->name('examples.login');
            Route::get('/examples/register', 'ExampleController@registerPage')->name('examples.register');
        });
    }
}
