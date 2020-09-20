<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('img/robot.jpeg') }}" class="brand-image img-bordered-sm elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Panel de Control</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('/storage/avatar/'.Auth::user()->avatar) }}" class="img-circle"></td>
      </div>
      <div class="info">
        <a href="{{ route('users.show',Auth::user()->id) }}" class="d-block">{{ Auth::user()->email }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can('usuario_index')
        <li class="nav-item has-treeview">
          <a href="{{ route('users.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuarios <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('crear_usuario')
            <li class="nav-item">
              <a href="{{ route('users.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>Crear Usuario</p>
              </a>
            </li>
            @endcan
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fas fa-users"></i>
                <p>Lista de Usuarios</p>
              </a>
            </li>
          </ul>
          @endcan
        </li>
        @role('administrador')
        <li class="nav-item has-treeview">
          <a href="{{ route('roles.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>
              Roles & Permisos<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="fas fa-lock"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('permissions.index') }}" class="nav-link">
                <i class="fas fa-lock-open"></i>
                <p>Permisos</p>
              </a>
            </li>
          </ul>
        </li>
        @endrole
        <li class="nav-item has-treeview">
          <a href="{{ route('bitacorasresidencia.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
            Bitacoras <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('bitacorasresidencia.index') }}" class="nav-link">
                <i class="fas fa-file-signature"></i>
                <p>Bitacora Residencia</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bitacoraservicio.index') }}" class="nav-link">
                <i class="fas fa-file-signature"></i>
                <p>Bitacora Servicio Social</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('visits.index') }}" class="nav-link">
                <i class="fas fa-file-signature"></i>
                <p>Bitacora Visita-Asesoria</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('materials.index') }}" class="nav-link">
                <i class="fas fa-file-signature"></i>
                <p>Bitacora Material</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="{{ route('uploadpdf.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>Archivos de PDF <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('uploadpdf.index') }}" class="nav-link">
                  <i class="fas fa-file-pdf"></i>
                  <p>Lista de PDF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('uploadpdf.create') }}" class="nav-link">
                   <i class="fas fa-file-pdf"></i>
                   <p>Subir PDF</p>
                </a>
              </li>
            </ul>
          </li>
        @role('administrador')
        <li class="nav-item has-treeview">
            <a href="{{ route('noticias.index') }}" class="nav-link">
                <i class="nav-icon far fa-newspaper"></i>
                <p>Eventos <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('noticias.create') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <p>Crear Evento</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('noticias.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <p>Lista de Eventos</p>
                  </a>
              </li>
            </ul>
        </li>
        @endrole
        <li class="nav-item has-treeview">
          <a href="{{ route('posts.index') }}" class="nav-link">
            <i class="nav-icon fas fa-question"></i>
            <p>
            Preguntas
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
