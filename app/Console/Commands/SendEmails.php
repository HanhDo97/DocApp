<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use App\Mail\ExampleEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Sleep;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SendMailJob::dispatch('Message from ancestor');

        $this->info('Emails have been sent successfully.');
    }
}
