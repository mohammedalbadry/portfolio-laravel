<?php

namespace App\Http\Controllers\CPanal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public $page_title = "messages"; 
    public $model_name = "App\Models\Message";
    public $view_routh = "cpanal.message";
    public $img_path = "/upload/message/";
    public $url_redirect = 'admin/message';


    public function index(Request $request)
    {
        $data = $this->model_name::when($request->search, function($query) use ($request){
            return $query->where('title', 'like', '%' . $request->search . '%');
        })->orderBy('id', 'DESC')->paginate(25);

        $title = $this->page_title;
        return view($this->view_routh . ".index", compact('data','title'));
    }

    public function destroy($id)
    {
        $model = $this->model_name::find($id);
        $model->delete();
        session()->flash('success', 'deleted successfully');
        return redirect($this->url_redirect);
        
    }
}
