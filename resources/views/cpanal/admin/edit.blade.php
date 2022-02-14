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

                <form role="form" method="post" action="{{url('admin/profile')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">name</label>
                        <input name="name" value="{{auth()->user()->name}}" type="text" class="form-control" placeholder="name">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input name="email" value="{{auth()->user()->email}}" type="text" class="form-control" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input name="password" value="" type="text" class="form-control" placeholder="password ...">
                    </div>

                    <div class="form-group">
                        <label for="confirmed">password confirme</label>
                        <input name="password_confirmation" value="" type="text" class="form-control" placeholder="password confirmed ...">
                    </div>


                    <div class="form-group">
                        <label for="name">photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="photo" class="custom-file-input input_live_img" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <img class="live_img" src="{{auth()->user()->photo_path}}" alt="">
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