@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('avatar/'.Auth::user()->avatar) }}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">
                  {{ Auth::user()->name }}
              </h3>

              <p class="text-muted text-center">{{ Auth::user()->email }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Apellidos</b> <a class="float-right">{{ Auth::user()->lastname }}</a>
                </li>
                <li class="list-group-item">
                  <b>Visitas</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Ocupación</b> <a class="float-right">Maestro</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sobre Mí</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Miembro desde</strong>
              <p class="text-muted">{{ Auth::user()->created_at }}</p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i>Ultima Actualización</strong>
              <p class="text-muted">{{ Auth::user()->updated_at }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{ asset('avatar/'.Auth::user()->avatar) }}" alt="user image">
                      <span class="username">
                        <a href="{{ route('users.show', $users->id) }}">{{ Auth::user()->name }}</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">Shared publicly - 7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>

                    <p>
                      <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                      <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                      <span class="float-right">
                        <a href="#" class="link-black text-sm">
                          <i class="far fa-comments mr-1"></i> Comments (5)
                        </a>
                      </span>
                    </p>

                    <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
