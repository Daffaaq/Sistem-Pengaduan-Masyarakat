<?php

namespace App\Listeners;

use App\Events\ComplaintAnswered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateComplaintStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ComplaintAnswered  $event
     * @return void
     */
    public function handle(ComplaintAnswered $event)
    {
        $answer = $event->answer;
        $complaint = $answer->complaint;

        if ($complaint->status !== 'resolved') {
            $complaint->status = 'resolved';
            $complaint->save();
        }
    }
}
