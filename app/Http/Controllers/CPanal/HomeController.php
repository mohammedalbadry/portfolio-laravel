<?php

namespace App\Http\Controllers\CPanal;

use App\Models\Views;
use App\Models\Message;
use App\Models\Project;
use App\Models\Section;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $message_count = Message::count();
        $feedback_count = Feedback::count();
        $projects_count = Project::count();
        $section_count = Section::count();

        $views = Views::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('SUM(views) as views')
        )->groupBy('day')->orderBy('created_at', 'desc')->take(15)->get();



        $visitos_days=[];

        foreach($views as $one){
            $visitos_days[] .= $one->day ;
        }
        $visitos_views=[];
        foreach($views as $one){
            $visitos_views[] .= $one->views ;
        }

        $visitos_views = array_reverse($visitos_views);

        return view('cpanal/home', compact(
            'message_count', 'feedback_count',
            'projects_count', 'section_count',
            'visitos_days', 'visitos_views'
        ));
    }
}
