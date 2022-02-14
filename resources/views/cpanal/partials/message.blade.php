@if(session('erorr'))
    <div class="alert alert-danger">
        {{ session('erorr') }}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('add'))
    <div class="alert alert-success">
        {{ session('add') }}
    </div>
@endif

@if(session('update'))
    <div class="alert alert-primary">
        {{ session('update') }}
    </div>
@endif