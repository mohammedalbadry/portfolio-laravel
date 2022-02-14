<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name', 'logo', 'icon', 'description', 'status', 'alt_text',
    ];

    protected $appends = ['logo_path','icon_path'];

    public function getLogoPathAttribute()
    {
        return asset("upload/setting/" . $this->attributes['logo']);
    }
    public function getIconPathAttribute()
    {
        return asset("upload/setting/" . $this->attributes['icon']);
    }

}
