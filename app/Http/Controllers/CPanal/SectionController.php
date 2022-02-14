<?php

namespace App\Http\Controllers\CPanal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public $page_title = "sections"; 
    public $model_name = "App\Models\Section";
    public $view_routh = "cpanal.section";
    public $img_path = "/upload/section/";
    public $url_redirect = 'admin/section';


    public function index(Request $request)
    {
        $data = $this->model_name::when($request->search, function($query) use ($request){
            return $query->where('title', 'like', '%' . $request->search . '%');
        })->orderBy('id', 'DESC')->paginate(25);

        $title = $this->page_title;
        return view($this->view_routh . ".index", compact('data','title'));
    }


    public function create()
    {
        $title = "add section";
        return view($this->view_routh . '.create', compact('title'));
    }


    public function store(Request $request)
    {        
        $data = $request->validate([
            'title' => 'required',
            'about' => 'required',
        ]);

        $model = $this->model_name::create($data);
        session()->flash('add', 'successfully added');
        return redirect($this->url_redirect);
    }

    public function edit($id)
    {
        $data = $this->model_name::find($id);
        if ($data == null) {
            abort(404);
        }
        $title = "edit section";

        return view($this->view_routh . '.edit', compact(['title', 'data']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'about' => 'required',
        ]);

        $model = $this->model_name::find($id);

        $model->update($data);

        session()->flash('update', 'edited successfully');

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
