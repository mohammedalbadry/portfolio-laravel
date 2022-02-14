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

                <form role="form" method="post" action="{{url('admin/email/' . $data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="from">from</label>
                        <input name="from" value="{{ $data->from }}" type="text" class="form-control" placeholder="send from" {{ $data->status == 1 ? "readonly" : " "}}>
                    </div> 

                    <div class="form-group">
                        <label for="to">to</label>
                        <input name="to" value="{{ $data->to }}" type="text" class="form-control" placeholder="send to" {{ $data->status == 1 ? "readonly" : " "}}>
                    </div>

                    <div class="form-group">
                        <label for="subject">subject</label>
                        <input name="subject" value="{{ $data->subject }}" type="text" class="form-control" placeholder="email subject" {{ $data->status == 1 ? "readonly" : " "}}>
                    </div>

                    <div class="form-group">
                        <label>compose email</label>
                        <textarea id="editor1" class="form-control" name="body" rows="6" placeholder="compose email ..." {{ $data->status == 1 ? "readonly" : " "}}>{{ $data->body }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control" name="status">
                          <option value="0" {{ $data->status == 0 ? "selected=selected" : " "}} >save</option>
                          <option value="1" {{ $data->status == 1 ? "selected=selected" : " "}}>save and send</option>
                        </select>
                    </div>

                  

                    <div class="form-group">
                      @if($data->status == 1)
                          <span class="btn btn-danger">sent and cannot be modified</span>
                      @else
                          <button type="submit" class="btn btn-primary">save</button>
                      @endif


                    </div>
                </form>
                
            </div>
        </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection