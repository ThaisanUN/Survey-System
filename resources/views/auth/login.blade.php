@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-headingr"> 
                <h3 class="panel-title"> {{__('Login')}}
               </h3>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                        <input type='text' name="username"
                        id="username"
                        class="form-control input-sm @error('username') is-invalid @enderror"
                        value="{{ old('username') }}" required autocomplete="username" autofocus
                        placeholder="Email Address">

                                @if ($errors ->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first("username")}}</strong>
                                    </span>
                                @endif
                                @if ($errors ->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first("email")}}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row">
                            <input type="password"
                              name="password"
                              id="password"
                              class="form-control input-sm @error('password') is-invalid @enderror"
                              required autocomplete="current-password"
                              placeholder="Password">
                                

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
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
