<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  string  $senderType
     * @param  string  $message
     */
    public function __construct(
        public string $senderType,
        public string $message,
    ) {
        //
    }

    public function broadcastOn(): Channel|array
    {
        return new Channel('chat');
    }
}
