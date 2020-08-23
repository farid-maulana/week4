<nav class="main-header navbar navbar-expand-lg navbar-light navbar-white sticky-top">
    <div class="container">
        {{-- <a href="#" class="navbar-brand">
            <img src="{{ asset('img/4.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8"> StackOverflow KW
        </a> --}}

        {{-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="order-3" id="navbarCollapse">
            <!-- Left navbar links -->

        </div> --}}
        <ul class="order-0 order-md-0 navbar-nav">
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li> --}}
            <li class="nav-item float-right">
                <a href="{{ route('pertanyaan.index') }}" class="nav-link">Pertanyaan</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            @auth
            <!-- Users Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('profile.edit', ['profile' => Auth::user()->profile->id]) }}">
                        Edit Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-item" href="#">
                        Poin Reputasi : {{ Auth::user()->profile->poin }}
                    </p>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth

            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link text-primary" href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-fw mr-1 fa-sm"></i>{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-primary" href="{{ route('register') }}"><i class="fas fa-address-card fa-fw mr-1 fa-sm"></i>{{ __('Register') }}</a>
            </li>
            @endif
            @endguest
        </ul>
    </div>
</nav>
