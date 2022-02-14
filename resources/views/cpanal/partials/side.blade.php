<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url("/admin")}}" class="brand-link">
      <img src="{{$setting->logo_path}}" alt="{{$setting->name}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$setting->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->photo_path}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('admin/profile')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{url("/admin")}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>home</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/project")}}" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>project</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{url("/admin/section")}}" class="nav-link">
              <i class="nav-icon fas fa-object-ungroup"></i>
              <p>section</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/section-details")}}" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>section details</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/email")}}" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>email</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/message")}}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>message</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/feedback")}}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>feedback</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/laravel-filemanager")}}" class="nav-link">
              <i class="nav-icon fas fa-folder-plus"></i>
              <p>file manager</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url("/admin/setting")}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>setting</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>