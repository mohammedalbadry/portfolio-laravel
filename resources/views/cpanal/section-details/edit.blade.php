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

                <form role="form" method="post" action="{{url('admin/section-details/' . $data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    
                    <div class="form-group">
                        <label>main section</label>
                        <select class="form-control" name="section_id">
                          @foreach($all_sections as $key => $section)
                             <option value="{{$section->id}}" {{ $data->mainsection->id ==  $section->id ? "selected=selected" : " "}}>{{$section->title}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">title</label>
                        <input name="title" value="{{$data->title}}" type="text" class="form-control" placeholder="section title">
                    </div>

                    <div class="form-group">
                        <label for="prop_name">property name</label>
                        <input name="prop_name" value="{{$data->prop_name}}" type="text" class="form-control" placeholder="property  name">
                    </div>

                    <div class="form-group">
                        <label for="prop_value">property value</label>
                        <input name="prop_value" value="{{$data->prop_value}}" type="text" class="form-control" placeholder="property  value">
                    </div>

                    <div class="options">
                        <div class="options-header">
                          <h3 class="options-title">more option</h3>
                          <div class="options-action">
                            <div class="btn btn-success" id="add_option">add</div>
                            <div class="btn btn-danger"  id="remove_option">remove</div>
                          </div>

                        </div>
                        <div class="options-body">        
                          <div class="row option-title">

                            <div class="col-1 input-center">
                                #                       
                            </div>
                            
                            <div class="col-11 col-md-5">                            
                                <h5>property name (unique)</h5>
                            </div>
      
                            <div class="col-11 col-md-6">
                                <h5>property value</h5>
                            </div>

                          </div>



                          @foreach(json_decode($data->options) as $key => $value)

                            <div class="row one_option">      
                              <div class="col-1 input-center">
                                <div class="form-group">
                                    <input class="item_check" type="checkbox">
                                </div>
                              </div>

                              <div class="col-11 col-md-5">
                                <div class="form-group">
                                  <input name="option_name[]" value="{{$key}}" type="text" class="form-control" placeholder="property  value">
                                </div>
                              </div>                         

                              <div class="col-11 col-md-6">
                                <div class="form-group">
                                  <input name="option_value[]" value="{{$value}}" type="text" class="form-control" placeholder="property  value">
                                </div>
                              </div>
                            </div>

                          @endforeach
                          

                        </div>            
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