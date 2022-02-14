<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$setting->name}}</title>
    <link rel="icon" href="{{$setting->icon_path}}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600&display=swap" rel="stylesheet"> 
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset("enduser/css/all.css")}}">
    <!-- main style file -->
    <link rel="stylesheet" href="{{asset("enduser/css/main.css")}}">
</head>
<body id="home">

    @yield('content')

    @include('enduser/partials/footer')


    <a class="btn" href="#home" id="go_to_top"> 
        <i class="fas fa-chevron-up"></i>
    </a>

    <div class="modal-container" id="feedback_modal">
        <div class="modal-overlay">
            <div class="modal">
                <div class="modal-header">
                    <h5 class="modal-title">add feedback</h5>
                    <button class="close" id="feedback_close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('feedback')}}" method="POST" id="feedback_id">
                        @csrf

                        <div class="form-group">
                            <label for="">name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">feedback</label>
                            <textarea name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">avatar gender</label>
                            <div class="radio-group">
                                <input type="radio" name="avatar_gender" value="male">
                                <label for="">male</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" name="avatar_gender" value="female">
                                <label for="">female</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input class="btn submit" type="submit" form="feedback_id" value="submit">
                </div>
            </div>
        </div>
    </div>

    

    <script src="{{asset("enduser/js/smooth-scroll.min.js")}}"></script>
    <!-- main js file -->
    <script src="{{asset("enduser/js/main.js")}}"></script>

    @include('enduser/partials/message')

</body>
</html>