<?php

namespace App\Http\Controllers\CPanal;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public $page_title = "projects"; 
    public $model_name = "App\Models\Project";
    public $view_routh = "cpanal.project";
    public $img_path = "/upload/project/";
    public $url_redirect = 'admin/project';


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
        $title = "add project";
        return view($this->view_routh . '.create', compact('title'));
    }


    public function store(Request $request)
    {        
        $data = $request->validate([
            'title' => 'required',
            'job_title' => 'required',
            'details' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($files = $request->file('img')) {        
            $ImageUpload = Image::make($files);
            $image_name = time().$files->getClientOriginalName();
            $ImageUpload->save(public_path() . $this->img_path . $image_name);
            $data['img'] = $image_name;
        }

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
        $title = "edit project";

        return view($this->view_routh . '.edit', compact(['title', 'data']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'job_title' => 'required',
            'details' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $model = $this->model_name::find($id);

        if ($files = $request->file('img')) {

            if($model->img != "default.png") {      
                Storage::disk('public_uploads')->delete($this->img_path . $model->img);
            }   
                 
            $ImageUpload = Image::make($files);
            $image_name = time().$files->getClientOriginalName();
            $ImageUpload->save(public_path() . $this->img_path . $image_name);
            $data['img'] = $image_name;
        }

        $model->update($data);

        session()->flash('update', 'edited successfully');

        return redirect($this->url_redirect);
    }


    public function destroy($id)
    {
        $model = $this->model_name::find($id);
        if($model->img != "default.png") {
            Storage::disk('public_uploads')->delete($this->img_path . $model->img);
        }

        $model->delete();
        session()->flash('success', 'deleted successfully');
        return redirect($this->url_redirect);
        
    }
}
