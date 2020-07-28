 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-cyan navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">4</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">4 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('/storage/avatar/'.Auth::user()->avatar) }}" class="user-image img-circle elevation-2">
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{ asset('/storage/avatar/'.Auth::user()->avatar) }}" class="img-circle elevation-2">
            <p>
              {{ Auth::user()->name }}
              <small>{{ Auth::user()->lastname  }}</small>
              <small>{{ Auth::user()->control_number }}</small>
              <small>Creado el {{ Auth::user()->created_at }}</small>
            </p>
          </li>
          <!-- Menu Body
          <li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div>
            row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">
              <i class="fas fa-user"></i> Perfil
            </a>
            <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->