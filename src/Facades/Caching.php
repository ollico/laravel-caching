<?php

declare(strict_types=1);

namespace Ollico\Caching\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void rules(Closure|array $callback)
 * @method static bool forget(string|App\Domain\Shared\CacheKey $key)
 * @method static mixed remember(string|App\Domain\Shared\CacheKey $key, \Closure $callback)
 *
 * @see \Ollico\Caching\CachingManager
 */
class Caching extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ollico\Caching\CachingManager::class;
    }
}
