@extends('layouts.app')

@section('content')
    <div class="blog-form">
        <div class="blog-card">

            <div class="card-title">
                <h1>
                    {{ __('Reset Password') }}
                </h1>
            </div>
            <div class="content">
                @if (session('status'))
                    <article class="message is-success">
                        <div class="message-body">
                            {{ session('status') }}
                        </div>
                    </article>
                @endif

                <form method="POST" action="{{ route('password.email') }}" id="forgot-password">
                    @csrf
                    <div class="field">
                        <label class="label">{{ __('E-Mail Address') }}</label>
                        <div class="control has-icons-left">
                            <input name="email" class="input @error('email') is-danger @enderror field-spacer"
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
                    <button type="submit" class="form-button" onclick="event.preventDefault();
                                                     document.getElementById('forgot-password').submit();">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
