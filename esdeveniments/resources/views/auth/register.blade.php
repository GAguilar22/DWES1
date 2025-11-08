@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correu') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data_naixement" class="col-md-4 col-form-label text-md-end">{{ __('Data de naixement') }}</label>

                            <div class="col-md-6">
                                <input id="data_naixement" type="date"
                                       class="form-control @error('data_naixement') is-invalid @enderror"
                                       name="data_naixement" value="{{ old('data_naixement') }}" required autocomplete="bday">
                                @error('data_naixement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" 
                                       class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Ja estas registrat?') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar-se') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
