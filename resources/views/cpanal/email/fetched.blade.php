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

            </div>
            <div class="card-body">
                @if ($aMessage->count() > 0)
                        @foreach($aMessage as $kay => $item)

                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">{{$item->getSubject()}}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <h5>from: {{$item->getFrom()[0]->mail}}</h5>
                                    <div>
                                        {!! $item->getHTMLBody(true) !!}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    {{'Attachments: ' . $item->getAttachments()->count()}}
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            
                        @endforeach
                @else
                <h3 class="alert alert-primary text-center">there are no records</h3>
              @endif
            </div>

        </div>


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection