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
            <div class="card-header">

              @include('cpanal.partials.message')

              <div class="row">
                <div class="col-md-5">
                  <form action="{{url('admin/message')}}" method="get">
                      <div class="input-group">
                          <input name="search" value="{{request()->search}}" type="text" class="form-control" placeholder="search">
                          <span class="input-group-append">
                              <button type="submit" class="btn btn-primary btn-flat">search</button>
                          </span>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              @if ($data->count() > 0)
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>message</th>


                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $kay => $item)
                      
                        <tr>
                          <td>{{$kay + 1}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->phone}}</td>
                          <td>{{$item->message}}</td>

                          <td>
                          <button class="btn btn-danger  btn-sm" data-toggle="modal" data-target="#modal-default{{$item->id}}">delete <i class="fa fa-trash-alt"></i></button>
                            
                            <div class="modal fade" id="modal-default{{$item->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">delete message</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>are you sure to delete <strong>{{$item->name}}</strong></p>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <form method="post" action="{{url("admin/message/".$item->id)}}">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger">confirm</button>
                                    </form>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>

                          </td> 
                        </tr> 

                    @endforeach
                  </tbody>
                </table>
                {{-- $data->appends(request()->query())->links() --}}
              @else
                <h3 class="alert alert-primary text-center">there are no records</h3>
              @endif
            </div>

        </div>


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection