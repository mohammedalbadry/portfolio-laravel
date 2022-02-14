@extends('cpanal.layouts.index')
@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$title}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">{{$title}}</li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

        <div class="card card-primary card-outline">

            <div class="card-body">

                @include('cpanal.partials.message')

                <form role="form" method="post" action="{{url('admin/setting')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">site name</label>
                        <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="site name">
                    </div>

                    <div class="form-group">
                        <label for="name">site logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input input_live_img" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <img class="live_img" src="{{$data->logo_path}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="name">site icon</label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="icon" class="custom-file-input input_live_img" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <img class="live_img" src="{{$data->icon_path}}" alt="">
                    </div>


                    <div class="form-group">
                        <label>description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="description ...">{{$data->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control" name="status">
                          <option value="open" {{$data->status == 'open' ? "selected=selected": ' '}}>open</option>
                          <option value="close" {{$data->status == 'close' ? "selected=selected": ' '}}> close</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>alternative text</label>
                        <textarea class="form-control" name="alt_text"  rows="3" placeholder="alternative text ...">{{$data->alt_text}}</textarea>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">save changes</button>
                    </div>
                </form>
                
            </div>
        </div>


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection