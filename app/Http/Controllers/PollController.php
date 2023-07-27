<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\polls;

class PollController extends Controller
{
    public function like($id)
    {
        $poll = polls::find($id);

        if ($poll) {
            $poll->likes++;
            $poll->save();
            return redirect()->route('polls.show', $id)->with('success', 'Anda menyukai polling ini!');
        } else {
            return redirect()->route('polls.index')->with('error', 'Polling tidak ditemukan.');
        }
    }
    public function dislike($id)
    {
        $poll = polls::find($id);

        if ($poll) {
            $poll->dislikes++;
            $poll->save();
            return redirect()->route('polls.show', $id)->with('success', 'Anda tidak menyukai polling ini!');
        } else {
            return redirect()->route('polls.index')->with('error', 'Polling tidak ditemukan.');
        }
    }
}
