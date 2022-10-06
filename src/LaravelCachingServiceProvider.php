<?php

namespace Ollico\Caching;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelCachingServiceProvider extends PackageServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton(CachingManager::class, function () {
            return new CachingManager(now()->addDays(365));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-caching')
            ->publishesServiceProvider('CachingServiceProvider')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Installing ollico/laravel-caching');
                    })
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Completed installation of ollico/laravel-caching');
                    });
            });
    }
}
