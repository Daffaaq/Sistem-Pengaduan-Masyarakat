<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\AnswerComplaints;

class ComplaintAnswered
{
    use SerializesModels;

    public $answer;

    /**
     * Create a new event instance.
     *
     * @param  AnswerComplaint  $answer
     * @return void
     */
    public function __construct(AnswerComplaints $answer)
    {
        $this->answer = $answer;
    }
}
