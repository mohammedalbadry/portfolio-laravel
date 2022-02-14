<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'job_title', 'details','img'
    ];
    protected $appends = ['img_path'];

    public function getImgPathAttribute()
    {
        return asset("upload/project/" . $this->attributes['img']);
    }
}
