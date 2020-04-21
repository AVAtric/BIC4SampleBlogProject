@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="card blog-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ $blog->title }}</h1>
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

                            <form method="POST" action="{{ route('blog.update', $blog->slug) }}">
                                @csrf
                                @method('PUT')

                                <div class="field">
                                    <label class="label">{{ __('Message') }}</label>
                                    <div class="control">
                                        <textarea name="body" id="body" @error('body')class="is-danger"@enderror
                                        class="textarea">{{ $blog->body }}</textarea>
                                    </div>
                                    @error('body')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                    <p class="help">You can use <a target="_blank" href="https://daringfireball.net/projects/markdown/syntax">Markdown</a> syntax here</p>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                    {{ __('Post') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
