<?php

namespace App\Http\Controllers\EndUser;

use App\Models\Project;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index($id){
        
       $header = Section::where('title', 'header')->first();
       $contact = Section::where('title', 'contact me')->first();
       $project = Project::where('id', $id)->firstOrFail();
       return view('enduser.project', compact('header', 'contact', 'project'));
    }
}
