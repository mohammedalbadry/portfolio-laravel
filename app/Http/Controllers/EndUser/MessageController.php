<?php

namespace App\Http\Controllers\EndUser;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Notifications\NewMessage;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function add(Request $request)
    {       
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'message' => 'required',

        ]);
        Message::create($data);

        $user = User::first();
        $user->notify(new NewMessage());
        
        session()->flash('add', 'successfully added');
        return back();
    }
}
