<?php

namespace Ollico\LaravelCaching\Commands;

use Illuminate\Console\Command;

class LaravelCachingCommand extends Command
{
    public $signature = 'laravel-caching';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
