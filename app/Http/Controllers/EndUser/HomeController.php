<?php

namespace App\Http\Controllers\EndUser;

use App\Models\Views;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\Section;

class HomeController extends Controller
{
    public function index(){

        $header = Section::where('title', 'header')->first();
        $overview = Section::where('title', 'overview')->first();
        $skills = Section::where('title', 'skills')->first();
        $testmonials = Section::where('title', 'testmonials')->first();
        $contact = Section::where('title', 'contact me')->first();

        $feedbacks = Feedback::where('status',1)->orderBy('id', 'DESC')->take(3)->get();
        //$portfolio = Section::where('title', 'portfolio')->first();
        $projects = Project::orderBy('id', 'DESC')->take(6)->get();



        //dd(json_decode( $header->details()->first()->options)->background );
        //dd($contact->details()->where('title', "contact information")->get());
        $this->ViewsCounter('home');
        return view('enduser.index', compact(
            'header', 'overview', 'skills',
            'testmonials', 'feedbacks', 'projects', 'contact'));
        }


    public function ViewsCounter($name, $id = null){

        $today = Views::where('view_name', $name)
                              ->where('created_at', '>=', date('Y-m-d').' 00:00:00');

        if($today->count() == 0){
            Views::create([
                'view_name' => $name,
                'views' => 1,
            ]);
        }else{
            $data = $today->latest()->first();
            $data->update([
                'views' => $data->views + 1
            ]);
        }
    }
}
