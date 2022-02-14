<?php

namespace App\Http\Controllers\CPanal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public $page_title = "feedback"; 
    public $model_name = "App\Models\Feedback";
    public $view_routh = "cpanal.feedback";
    public $img_path = "/upload/feedback/";
    public $url_redirect = 'admin/feedback';


    public function index(Request $request)
    {
        $data = $this->model_name::when($request->search, function($query) use ($request){
            return $query->where('title', 'like', '%' . $request->search . '%');
        })->orderBy('id', 'DESC')->paginate(25);

        $title = $this->page_title;
        return view($this->view_routh . ".index", compact('data','title'));
    }

    public function approval($id)
    {
        $model = $this->model_name::find($id);
        $model->update(['status' => 1]);
        session()->flash('update', 'updated successfully');
        return redirect($this->url_redirect);   
    }

    public function destroy($id)
    {
        $model = $this->model_name::find($id);
        $model->delete();
        session()->flash('success', 'deleted successfully');
        return redirect($this->url_redirect);   
    }
}
