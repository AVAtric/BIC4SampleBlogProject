@extends('layouts.app')

@section('content')
    <div class="blog-form">
        <div class="blog-card">

            <div class="card-title">
                <h1>Sign In</h1>
            </div>

            <div class="content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control has-icons-left">
                            <input id="email" title="email" name="email" type="email" required
                                   autocomplete="email" autofocus
                                   class="input @error('email') is-danger @enderror" value="{{old('email')}}">
                            <span class="icon is-small is-left">
                              <i class="fa fa-user"></i>
                            </span>
                        </div>
                        @error('email')
                            <p class="help is-danger">Email is not valid</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control has-icons-left">
                            <input id="password" title="password" name="password" type="password" required
                                   autocomplete="current-password"
                                   class="input @error('password') is-danger @enderror">
                            <span class="icon is-small is-left">
                              <i class="fa fa-key"></i>
                            </span>
                        </div>
                        @error('email')
                            <p class="help is-danger">Password is not valid</p>
                        @enderror
                    </div>

                    <div class="level options">
                        <div class="checkbox level-left">
                            <input class="regular-checkbox" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember"></label>
                            <span>{{ __('Remember Me') }}</span>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link level-right" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <button type="submit" class="form-button">{{ __('Login') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
