<?php

namespace App\Jobs;

use App\Models\BlogPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;


class BlogPostAfterCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private  $blogPost;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BlogPost $blogPost)
    {
        $this->blogPost = $blogPost;

        // set queue
       // $this->onQueue("test_queue");
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         Log::info("Создана новая запись в блоге [{$this->blogPost->id}]");
    }
}
