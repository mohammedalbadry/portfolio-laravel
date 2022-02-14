
@if(session('erorr'))
    <script>
        toster("notifications-danger","{{ session('erorr') }}", "fa-exclamation-circle", 3000);
    </script>
@endif


@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            toster("notifications-danger","{{ $error }}", "fa-exclamation-circle", 3000);
        @endforeach
    </script> 
@endif


@if(session('success'))
    <script>
        toster("notifications-success","{{ session('success') }}", "fa-check-circle", 3000);    
    </script> 
@endif

@if(session('add'))
    <script>
        toster("notifications-success","{{ session('add') }}", "fa-check-circle", 3000);    
    </script> 
@endif

@if(session('update'))
    <script>
        toster("notifications-primary","{{ session('update') }}", "fa-check-circle", 3000);    
    </script> 
@endif