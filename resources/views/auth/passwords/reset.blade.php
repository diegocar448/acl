@extends('auth.templates.template')

@section('content-form')
    <form class="login form" method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                <input id="email" type="email" class="form-control"
                       name="email" value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">

                <input id="password" type="password"
                       class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

            {{--@if({$errors->has('password_confirmation') ? ' is-invalid ' : ''})
            <span class="help-block">
                <strong>{{$errors->first('password_confirmation')}}</strong>
            </span>
            @endif--}}



        </div>

        <div class="form-group">

                <button type="submit" class="btn btn-login">
                    {{ __('Resetar Senha') }}
                </button>


        </div>
    </form>
@endsection
