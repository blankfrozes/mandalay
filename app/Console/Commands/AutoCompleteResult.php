<?php

namespace App\Console\Commands;

use App\Models\Result;
use Illuminate\Console\Command;

class AutoCompleteResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'complete:result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Set Complete To Result';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        Result::whereComplete(0)->update(['complete' => 1]);
        $this->info('Result Successfully Update To Complete!');
    }
}
