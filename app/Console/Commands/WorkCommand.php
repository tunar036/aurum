<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WorkCommand extends Command
{
    protected $signature   = 'images:work';
    protected $description = 'Queue works for images';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
         return $this->call('queue:work', [
        '--stop-when-empty' => null,
    ]);
    }
}
