<?php

declare(strict_types=1);

namespace Ollico\Caching;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class CachingManager
{
    protected Collection $rules;

    protected $rulesResolved = false;

    protected static $rulesCallback = null;

    public function __construct(protected Carbon $defaultTtl)
    {
        $this->rules = new Collection();
    }

    public function rules($rules): void
    {
        throw_unless(
            is_callable($rules) || is_array($rules),
            RuntimeException::class,
            '$rules must be of type callable or array'
        );

        static::$rulesCallback = is_callable($rules) ? $rules : Arr::wrap($rules);
    }

    public function ttl(string $key): Carbon
    {
        return $this->rule($key) ?: $this->defaultTtl;
    }

    public function remember(string $key, \Closure $callback)
    {
        return Cache::remember($key, $this->ttl($key), $callback);
    }

    public function forget(string $key): void
    {
        Cache::forget($key);
    }

    protected function rule($key)
    {
        $this->resolveRules();

        return $this->rules->get($key);
    }

    protected function resolveRules(): void
    {
        if ($this->rulesResolved) {
            return;
        }

        $rules = is_callable(static::$rulesCallback)
            ? call_user_func(static::$rulesCallback)
            : static::$rulesCallback;

        $this->rules = new Collection(filled($rules) ? $rules : []);
        $this->rulesResolved = true;
    }
}
