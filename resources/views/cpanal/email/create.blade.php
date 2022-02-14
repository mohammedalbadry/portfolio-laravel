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

                <form role="form" method="post" action="{{url('admin/email')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="from">from</label>
                        <input name="from" value="{{old('from')}}" type="text" class="form-control" placeholder="send from">
                    </div>

                    <div class="form-group">
                        <label for="to">to</label>
                        <input name="to" value="{{old('to')}}" type="text" class="form-control" placeholder="send to">
                    </div>

                    <div class="form-group">
                        <label for="subject">subject</label>
                        <input name="subject" value="{{old('subject')}}" type="text" class="form-control" placeholder="email subject">
                    </div>

                    <div class="form-group">
                        <label>compose email</label>
                        <textarea id="editor1" class="form-control" name="body" rows="6" placeholder="compose email ...">{{old('body')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control" name="status">
                          <option value="0">save</option>
                          <option value="1">save and send</option>
                        </select>
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