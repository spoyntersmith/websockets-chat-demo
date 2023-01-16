<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Broadcast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broadcast:message {message} --sender-type={senderType}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Broadcast a message';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = $this->argument('message');

        // Broadcast the message
        $event = new \App\Events\MessageSent(
            senderType: $this->option('sender-type'),
            message: $message
        );
        event($event);

        return 0;
    }
}
