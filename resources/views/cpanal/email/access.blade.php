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

                <div class="">
                    <h3>configuration required to use this feature</h3>
                    <ul style="list-style: none">
                        <li>Select Enable IMAP, from <a href="https://mail.google.com/mail/u/0/?tab=km#settings/fwdandpop" target="_blank">here</a></li>
                        <li>allow to less secure app, from <a href="https://myaccount.google.com/security" target="_blank">here</a></li>
                    </ul>
                </div>

                

                

                <form role="form" method="post" action="{{url('admin/access')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">email</label>
                        <input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="your email ...">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input name="password" value="{{old('password')}}" type="password" class="form-control" placeholder="your password ...">
                    </div>

                    <div class="form-group">
                        <label>email host</label>
                        <select class="form-control" name="host">
                          <option value="gmail">gmail</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>fetch date</label>
                        <select class="form-control" name="fetch_date">
                          <option value="3">last 3 day</option>
                          <option value="7">last 7 day</option>
                          <option value="10">last 10 day</option>

                        </select>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">fetch</button>
                    </div>
                </form>
                
            </div>
        </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection