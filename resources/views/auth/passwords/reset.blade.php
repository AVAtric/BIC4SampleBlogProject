@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Reset Password') }}</h1>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="field">
                                    <label class="label" for="email">{{ __('E-Mail Address') }}</label>
                                    <div class="control has-icons-left">
                                        <input name="email" class="input @error('email') is-danger @enderror"
                                               type="email" id="email"
                                               value="{{ $email ?? old('email') }}" required autocomplete="email"
                                               autofocus>
                                        <span class="icon is-small is-left">
                                <i class="fa fa-envelope"></i>
                            </span>
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label" for="password">{{ __('Password') }}</label>
                                    <div class="control has-icons-left">
                                        <input name="password" class="input @error('password') is-danger @enderror"
                                               type="password" id="password"
                                               required autocomplete="new-password">
                                        <span class="icon is-small is-left">
                                <i class="fa fa-key"></i>
                            </span>
                                    </div>
                                    @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label" for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="password"
                                               id="password-confirm" name="password_confirmation"
                                               required autocomplete="new-password">
                                        <span class="icon is-small is-left">
                                <i class="fa fa-repeat"></i>
                            </span>
                                    </div>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
