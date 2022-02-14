<?php

namespace App\Http\Controllers\CPanal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;
use Webklex\PHPIMAP\Exceptions\ConnectionFailedException;

class AccessController extends Controller
{
    public function index()
    {
        $title = "access email";
        return view("cpanal.email.access", compact('title'));
    }

    public function fetch(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'host' => 'required',
            'fetch_date'  => 'required',
        ]);
      
        config([
            'imap.accounts.default.host' => 'imap.gmail.com',
            'imap.accounts.default.username' => $data['email'],
            'imap.accounts.default.password' => $data['password']
        ]);

        $client = Client::account('default'); // defined in config/imap.php

        try {
            $client->connect();
        }catch (ConnectionFailedException $e){
            session()->flash('erorr', "Whoops: ".$e->getMessage());
            return back();
        }

        $title = "fetched email";
        $folders = $client->getFolder('INBOX');
        $aMessage = $folders->query()->since(now()->subDays($data['fetch_date']))->get();

        return view("cpanal.email.fetched", compact('title', 'aMessage'));
    }
}
