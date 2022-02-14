<?php

namespace App\Http\Controllers\CPanal;

use App\Models\User;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $title = "profile";
        return view('cpanal.admin.edit', compact('title'));
    }

    public function update(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->has('password') && $request->password != null){
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = bcrypt(request('password'));
        }

        $model = User::first();
        if ($files = $request->file('photo')) {

            if($model->photo != "default.png") {      
                Storage::disk('public_uploads')->delete("/upload/admin/" . $model->photo);
            }   
                 
            $ImageUpload = Image::make($files);
            $image_name = time().$files->getClientOriginalName();
            $ImageUpload->save(public_path() . "/upload/admin/" . $image_name);
            $data['photo'] = $image_name;
        }


        $model->update($data);

        session()->flash('update', 'edited successfully');
        return back();
    }
}
