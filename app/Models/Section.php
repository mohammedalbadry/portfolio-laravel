<?php

namespace App\Models;

use App\Models\SectionDetails;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title', 'about',
    ];

    public function details()
    {
        return $this->hasMany(SectionDetails::class);
    }

}
