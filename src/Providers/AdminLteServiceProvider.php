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
        Route::group([
            'middleware' => ['web'],
            'namespace' => 'AgusUsk\AdminLte\Http\Controllers'
        ], function () {
            // Dashboard route - conditionally protected if auth package is installed
            $dashboardRoute = Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
            
            // Add auth middleware only if auth package is installed
            if (class_exists('AgusUsk\AdminLteAuth\Providers\AuthServiceProvider')) {
                $dashboardRoute->middleware('auth');
            }
            
            // Example pages
            Route::get('/examples/login', 'ExampleController@loginPage')->name('examples.login');
            Route::get('/examples/register', 'ExampleController@registerPage')->name('examples.register');
        });
    }
}
