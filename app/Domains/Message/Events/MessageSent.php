<?php

namespace App\Domains\Message\Events;

use App\Message;
use App\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * User that sent the message
     * @var User
     */
    public $user;

    /**
     * Message details
     * @var Message
     */
    public $message;

    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on
     * @return PresenceChannel
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat');
    }

}
