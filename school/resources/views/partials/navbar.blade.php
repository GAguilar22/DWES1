<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#9820;</span> School</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( true || Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') && ! Request::is('students/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Inici
                        </a>
                    </li>
                    <!-- utilitzem també el if al navbar per a que apareixi la opcio de crear un cicle si el email es el de l'admin-->
                    @if (Auth::check() && Auth::user()->email == 'admin@admin.cat')
                        <li class="nav-item {{  Request::is('admin/create') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('admin.create')}}">
                                <span>&#10010</span> Nou cicle
                            </a>
                        </li>
                    @endif
                </ul>
                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        @if(Auth::check())
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name}}
                            </a>
                        @endif

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
