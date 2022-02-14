<?php

namespace App\Http\Controllers\CPanal;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionDetailsController extends Controller
{
    public $page_title = "section details"; 
    public $model_name = "App\Models\SectionDetails";
    public $view_routh = "cpanal.section-details";
    public $img_path = "/upload/section-details/";
    public $url_redirect = 'admin/section-details';


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
        $title = "add section details";
        $all_sections = Section::all();
        return view($this->view_routh . '.create', compact('title', 'all_sections'));
    }


    public function store(Request $request)
    {        


        $data = $request->validate([
            'section_id' => 'required|integer',
            'title' => 'required',
            'prop_name' => 'required',
            'prop_value' => 'required',

            'option_name' => 'array',
            'option_value' => 'array',

            'option_name.*' => 'nullable|required_with:option_value.*',
            'option_value.*' => 'nullable|required_with:option_name.*',

        ]);
        $option_array = [];

        if(isset($data['option_value'])){
            foreach ($data['option_value'] as $key => $value) {
                $option_array[$data['option_name'][$key]] = $data['option_value'][$key];
            }
        }
        
        $json_options = json_encode($option_array);
        $data['options'] = $json_options;

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

        $all_sections = Section::all();
        $title = "edit section details";

        return view($this->view_routh . '.edit', compact(['title', 'data', 'all_sections']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'section_id' => 'required|integer',
            'title' => 'required',
            'prop_name' => 'required',
            'prop_value' => 'required',

            'option_name' => 'array',
            'option_value' => 'array',

            'option_name.*' => 'nullable|required_with:option_value.*',
            'option_value.*' => 'nullable|required_with:option_name.*',

        ]);
        $option_array = [];
        if(isset($data['option_value'])){
            foreach ($data['option_value'] as $key => $value) {
                $option_array[$data['option_name'][$key]] = $data['option_value'][$key];
            }
        }
        $json_options = json_encode($option_array);
        $data['options'] = $json_options;

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
