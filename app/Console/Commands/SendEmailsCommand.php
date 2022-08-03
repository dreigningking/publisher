<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendSubscriberEmailJob;

class SendEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails {post} {--queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = $this->argument('post');
        SendSubscriberEmailJob::dispatch($post);
    }
}
