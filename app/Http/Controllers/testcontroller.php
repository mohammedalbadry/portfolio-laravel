<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;
use Webklex\PHPIMAP\Exceptions\ConnectionFailedException;

class testcontroller extends Controller
{
    public function test(){

    
        config([
            'imap.accounts.default.host' => 'imap.gmail.com',
            'imap.accounts.default.username' => 'mmhammha37@gmail.com',
            'imap.accounts.default.password' => 'm0120123698745'
        ]);

        $client = Client::account('default'); // defined in config/imap.php

        try {
            $client->connect();
        }catch (ConnectionFailedException $e){
            dd("Whoops: ".$e->getMessage());
        }


        
        $folders = $client->getFolder('INBOX');


        $aMessage = $folders->query()->since(now()->subDays(5))->get();


        foreach($aMessage as $oMessage){
            echo $oMessage->getSubject().'<br />';
            echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
            echo $oMessage->getHTMLBody(true);
        }



    }




}
