<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'name', 'message', 'avatar_gender', 'status'
    ];

    public function avatar(){
        if($this->avatar_gender == "male"){
            return asset("upload/avatar/male.png");
        } else {
            return asset("upload/avatar/female.png");
        }
    }

}
