@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            @if (session('status'))
                                <article class="message is-success">
                                    <div class="message-body">
                                        {{ session('status') }}
                                    </div>
                                </article>
                            @endif
                            <p>Welcome <strong>{{ auth()->user()->name }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="columns is-multiline">
                <div class="card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <form method="POST" action="{{ route('password.email') }}" id="forgot-password">
                                @csrf
                                <div class="field">
                                    <label class="label">{{ __('E-Mail Address') }}</label>
                                    <div class="control has-icons-left">
                                        <input name="email"
                                               class="input @error('email') is-danger @enderror"
                                               type="email"
                                               value="{{ old('email') }}" autocomplete="email" autofocus>
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    @error('email')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth"
                                        onclick="event.preventDefault();
                                                     document.getElementById('forgot-password').submit();">
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
