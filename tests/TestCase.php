<?php

namespace Ollico\LaravelCaching\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ollico\LaravelCaching\LaravelCachingServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Ollico\\LaravelCaching\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelCachingServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-caching_table.php.stub';
        $migration->up();
        */
    }
}
