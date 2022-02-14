<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link notifications-btn" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="notifications-badge badge badge-warning navbar-badge">{{auth()->user()->unreadNotifications->count() }}</span>
        </a>
        <div class="notifications-dropdown dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><span class="notifications-count">{{ auth()->user()->unreadNotifications->count() }}</span> Notifications</span>



          @foreach( auth()->user()->notifications as $notification) 
              <div class="dropdown-divider"></div>
              <a href="" class="dropdown-item">
                @if($notification->type == "App\Notifications\NewMessage")
                  <i class="fas fa-envelope mr-2"></i> 
                @else
                  <i class="fas fa-comment mr-2"></i> 
                @endif
                {{ $notification->data['text'] }}
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
              </a>

              <div class="dropdown-divider"></div>
              @break($loop->index > auth()->user()->unreadNotifications->count() + 5)
          @endforeach

          


          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn nav-link">
            <i class="fas fa-sign-out-alt"></i>
          </button>
        </form>
      </li>

    </ul>
  </nav>