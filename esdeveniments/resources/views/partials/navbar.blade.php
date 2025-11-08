<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        @if(Auth::check() && Auth::user()->rol === 'admin')
        <a class="navbar-brand" href="{{ route('admin.index') }}" style="color: black">
            <img src="{{asset('img/logoReservas.jpg')}}" alt="logo web" style="max-width: 40px";>
            ReservaYa
        </a>
        @else
        <a class="navbar-brand" href="{{ route('admin.index') }}" style="color: black">
            <img src="{{asset('img/logoReservas.jpg')}}" alt="logo web" style="max-width: 40px";>
            ReservaYa
        </a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::check() && Auth::user()->rol === 'admin')
                <ul class="navbar-nav me-auto">
                    <li class="nav-item {{ Request::is('admin/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.create') }}">
                            <span>&#10010;</span> Crear Esdeveniment
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('categories/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.create') }}">
                            <span>&#10010;</span> Crear Categoria
                        </a>
                    </li>
                </ul>
            @endif

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Perfil') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Tancar sessió') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
