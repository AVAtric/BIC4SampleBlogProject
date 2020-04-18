@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="card blog-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Register') }}</h1>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="field">
                                    <label class="label" for="name">{{ __('Name') }}</label>
                                    <div class="control has-icons-left">
                                        <input name="name" class="input @error('name') is-danger @enderror"
                                               type="text" id="name"
                                               value="{{ old('name') }}" required autocomplete="name"
                                               autofocus>
                                        <span class="icon is-small is-left">
                                    <i class="fa fa-user"></i>
                            </span>
                                    </div>
                                    @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label" for="email">Email</label>
                                    <div class="control has-icons-left">
                                        <input name="email" id="email" class="input @error('email') is-danger @enderror"
                                               type="email" required>
                                        <span class="icon is-small is-left">
                                    <i class="fa fa-envelope"></i>
                            </span>
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Email is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label" for="password">Password</label>
                                    <div class="control has-icons-left">
                                        <input name="password" id="password"
                                               class="input @error('password') is-danger @enderror"
                                               type="password"
                                               required>
                                        <span class="icon is-small is-left">
                                    <i class="fa fa-key"></i>
                            </span>
                                    </div>
                                    @error('password')
                                    <p class="help is-danger">Password is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label" for="password-confirm">Confirm Password</label>
                                    <div class="control has-icons-left">
                                        <input class="input field-spacer" type="password"
                                               id="password-confirm" name="password_confirmation"
                                               required>
                                        <span class="icon is-small is-left">
                                    <i class="fa fa-repeat"></i>
                            </span>
                                    </div>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                    {{ __('Register') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
