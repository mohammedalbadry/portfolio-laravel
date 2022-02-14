<?php

namespace App\Http\Controllers\CPanal;

use App\Mail\GeneralMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public $page_title = "emails"; 
    public $model_name = "App\Models\Email";
    public $view_routh = "cpanal.email";
    public $img_path = "/upload/email/";
    public $url_redirect = 'admin/email';


    public function index(Request $request)
    {
        $data = $this->model_name::when($request->search, function($query) use ($request){
            return $query->where('subject', 'like', '%' . $request->search . '%');
        })->orderBy('id', 'DESC')->paginate(25);

        $title = $this->page_title;
        return view($this->view_routh . ".index", compact('data','title'));
    }


    public function create()
    {
        $title = "new email";
        return view($this->view_routh . '.create', compact('title'));
    }


    public function store(Request $request)
    {      
        $data = $request->validate([
            'from' => 'required|email',
            'to' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);

        $model = $this->model_name::create($data);

        if($request->status == 1) {
            Mail::to($model->to)->send(new GeneralMail($model));
            session()->flash('add', 'successfully saved and sent');
        }else{
            session()->flash('add', 'successfully added');
        }

        return redirect($this->url_redirect);
    }

    public function edit($id)
    {
        $data = $this->model_name::find($id);
        if ($data == null) {
            abort(404);
        }
        $title = "edit email";

        return view($this->view_routh . '.edit', compact(['title', 'data']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'from' => 'required|email',
            'to' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);
        
        $model = $this->model_name::find($id);

        if($request->status == 1) {
            Mail::to($model->to)->send(new GeneralMail($model));
            session()->flash('update', 'updated and sent successfully');
        }else{
            session()->flash('update', 'successfully updated');
        }

        $model->update($data);
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
