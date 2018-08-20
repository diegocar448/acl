@extends('auth.templates.template')

@section('content-form')

    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

        <form class="login form" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-login">
                    <i class="fa fa-btn fa-envelope"></i>
                    {{ __('Enviar link de recuperação de senha') }}
                </button>
            </div>
        </form>

@endsection
