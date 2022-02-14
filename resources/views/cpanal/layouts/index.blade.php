<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$setting->name}}</title>

  <link rel="icon" href="{{$setting->icon_path}}"> 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("cpanal")}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("cpanal")}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset("cpanal")}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="{{asset("cpanal")}}/dist/css/my.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed" style="direction: ltr !important">
<div class="wrapper">

  <!-- Navbar -->
  @include('cpanal/partials/nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('cpanal/partials/side')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
   <!-- footer -->
   @include('cpanal/partials/footer')
   <!-- /.footer -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset("cpanal")}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("cpanal")}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset("cpanal")}}/plugins/chart.js/Chart.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset("cpanal")}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset("cpanal")}}/dist/js/adminlte.js"></script>
<script src="{{asset("cpanal")}}/dist/js/my.js"></script>

<script src="{{asset("cpanal")}}/ckeditor/ckeditor.js"></script>






<script>
  var url =  '{{ url('admin/markAsRead') }}';
  $('.notifications-btn').on('click', function() {
    $(".notifications-dropdown").toggleClass("show");
    $.get(url, function(res,status){
     if(status == "success"){
        $('.notifications-badge').hide();
        window.setTimeout(function () {
          $('.notifications-count').text("0");
        }, 5000);
     }
    });
  });
</script>

<script>


var laravel_url = '{!! url('admin/laravel-filemanager') !!}';

var options = {
  	language: 'en',

    filebrowserImageBrowseUrl: laravel_url,
    filebrowserImageUploadUrl: laravel_url,

    filebrowserBrowseUrl: laravel_url,
    filebrowserUploadUrl: laravel_url,
    removePlugins: 'easyimage, cloudservices',
  };

if ( ($("#editor1").length > 0)){
    CKEDITOR.replace('editor1', options);
}

</script>
@if(isset($visitos_days) && isset($visitos_views))
  @include('cpanal.partials.chart')
@endif
</body>
</html>
