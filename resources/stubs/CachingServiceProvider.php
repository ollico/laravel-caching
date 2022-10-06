<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Ollico\Caching\Facades\Caching;

class CachingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Caching::rules(function () {
            return [
                // 'key' => now()->addHours(1),
            ];
        });
    }
}
