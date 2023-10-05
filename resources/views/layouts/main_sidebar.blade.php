  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link" style="cursor: pointer;height: 80px;">
      <img src=" {{ asset('/dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="img-circle elevation-3 new-qwe" style="opacity: .8">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=" {{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{  Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link  {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/profile" class="nav-link {{ request()->is('profile') ? ' active' : '' }}"   >
            <i class="nav-icon fas fa-users"></i>
              <p>
              Profile Details
              </p>
            </a>
          </li>




          @if(auth()->user()->role == 'admin')

          <li class="nav-item">
            <a href="/admin/students" class="nav-link {{ request()->is('admin/students') ? 'active' : '' }}"   >
            <i class="nav-icon fas fa-users"></i>
              <p>
              manage users
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/labs" class="nav-link {{ request()->is('labs') ? ' active' : '' }}"   >
            <i class="nav-icon fas fa-desktop"></i>
              <p>
                Add/Remove Computer
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="/Msg" class="nav-link {{ request()->is('Msg') ? ' active' : '' }}"   >
            <i class="nav-icon far fa-envelope"></i>
              <p>
                Send Message
              </p>
            </a>
          </li>


          
          <li class="nav-item">
            <a href="/register_admin" class="nav-link {{ request()->is('register_admin') ? ' active' : '' }}"   >
            <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Register Admin
              </p>
            </a>
          </li>


        
          <li class="nav-item">
            <a href="/register" class="nav-link {{ request()->is('register') ? 'active' : '' }}"   >
            <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Register User
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link {{ request()->is('logout') ? ' active' : '' }}"   >
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
               Log out
              </p>
            </a>
          </li>

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <style>
.new-qwe {
    margin: -12px -3px;
    width: 102%;
    max-height: 74px !important;
}
.img-circle {
    border-radius: 5px !important;
}
  </style>