<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Cache;
use Ollico\Caching\CachingManager;
use Ollico\Caching\Facades\Caching;
use Ollico\Caching\LaravelCachingServiceProvider;
use Orchestra\Testbench\TestCase;

class CachingTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelCachingServiceProvider::class,
        ];
    }

    /** @test */
    public function it_can_cache()
    {
        Caching::remember('non_set_key', fn () => 'foobar');
        $this->assertTrue(Cache::has('non_set_key'));
    }

    /** @test */
    public function it_can_forget()
    {
        Caching::remember('non_set_key', fn () => 'foobar');
        Caching::forget('non_set_key');
        $this->assertFalse(Cache::has('non_set_key'));
    }

    /** @test */
    public function it_can_a_return_a_non_default_ttl()
    {
        $setTtl = now()->addWeek();

        $manager = new CachingManager(now()->addDays(365));
        $manager->rules(['set_key' => $setTtl]);

        $ttl = $manager->ttl('set_key');

        $this->assertEquals($setTtl->format('YmdHis'), $ttl->format('YmdHis'));
    }
}
