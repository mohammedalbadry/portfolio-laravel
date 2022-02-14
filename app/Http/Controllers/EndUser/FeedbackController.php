<?php

namespace App\Http\Controllers\EndUser;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Notifications\NewFeedback;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function add(Request $request)
    {        
        $data = $request->validate([
            'name' => 'required',
            'message' => 'required',
            'avatar_gender' => 'required',
        ]);
        Feedback::create($data);
        
        $user = User::first();
        $user->notify(new NewFeedback());

        session()->flash('add', 'successfully added');
        return back();
    }
}
