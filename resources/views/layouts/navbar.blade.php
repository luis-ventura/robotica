<div id="app">
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #212121; shadow-sm">
        <a class="navbar-brand" href="{{ url('/') }}" style="color: #ffffff;">Robotic</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @if(Route::has('login'))
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ url('/home') }}">Home</a>
                    </li>
                @else
                <li class="nav-item">
                     <a class="btn btn-primary" style="magin: 10px" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-primary" style="margin-left: 10px " href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                    </li>
                @endif
                @endauth
            </ul>
          @endif
        </div>
    </nav>

    @yield('content')
    
</div>