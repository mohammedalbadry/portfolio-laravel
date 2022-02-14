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

                <form role="form" method="post" action="{{url('admin/section')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">title</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="section title">
                    </div>

                    <div class="form-group">
                        <label>about</label>
                        <textarea class="form-control" name="about" rows="3" placeholder="about ...">{{old('about')}}</textarea>
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