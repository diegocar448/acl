@extends('auth.templates.template')

@section('content-form')
    <form class="login form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        @csrf

        <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
            <input placeholder="Digite o nome" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
            <input placeholder="Digite o email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input placeholder="Digite a senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input placeholder="Repita a senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-login">
                {{ __('Registrar') }}
            </button>
        </div>
    </form>
@endsection
