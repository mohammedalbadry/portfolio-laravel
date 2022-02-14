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

                <form role="form" method="post" action="{{url('admin/project/' . $data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="title">title</label>
                        <input name="title" value="{{$data->title}}" type="text" class="form-control" placeholder="project title">
                    </div>

                    <div class="form-group">
                        <label>details</label>
                        <textarea class="form-control" id="editor1" name="details" rows="3" placeholder="details ...">{{$data->details}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>job title</label>
                        <select class="form-control" name="job_title">
                          <option value="front end" {{ $data->job_title  == 'front end' ? 'selected' : "" }}>front end</option>
                          <option value="back end" {{ $data->job_title  == 'back end' ? 'selected' : "" }}>back end</option> 
                          <option value="full stack" {{ $data->job_title  == 'full stack' ? 'selected' : "" }}>full stack</option>
                          <option value="ui-ux" {{ $data->job_title  == 'ui-ux' ? 'selected' : "" }}>ui-ux</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="name">project image</label>
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input input_live_img" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                      </div>
                      <img class="live_img" src="{{$data->img_path}}" alt="">
                  </div>


                  

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>
                
            </div>
        </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection