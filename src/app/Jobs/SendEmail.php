<?php

namespace App\Jobs;

use App\Http\Controllers\PublishingPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Log\Logger;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $tries = 3;
    protected $args;
    /**
     * Create a new job instance.
     */
    public function __construct($args)
    {
        $this->args = $args;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        PublishingPost::store($this->args);
    }
}
