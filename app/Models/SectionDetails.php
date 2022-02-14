<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;

class SectionDetails extends Model
{
    protected $fillable = [
        'section_id', 'title', 'prop_name', 'prop_value', 'options',
    ];

    public function mainsection()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

}
