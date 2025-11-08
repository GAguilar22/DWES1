@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <h1 class="display-4" style="font-weight: bold;">ReservaYa</h1>
            <p class="lead">
                Benvingut a ReservaYa, la teva plataforma de referència per descobrir i reservar els esdeveniments més exclusius de la teva ciutat. 
                Aquí trobaràs una àmplia oferta que abasta des de concerts i exposicions fins a teatre i activitats esportives, tot en un sol lloc.
                La nostra missió és oferir-te experiències inoblidables i moments que quedin gravats en la teva memòria. 
                Uneix-te a la comunitat i gaudeix d'informació actualitzada, ofertes especials i una navegació fàcil per trobar l'esdeveniment que s'adapti a les teves passions.
            </p>
        </div>
    </div>

    <!-- Botón de "Registrat" ahora está fuera del card de login -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                {{ __('Registrat') }}
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correu') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contrasenya') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recorde\'m') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Has oblidat la contrasenya?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
