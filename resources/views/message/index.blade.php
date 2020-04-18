@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column hero is-bold is-info is-three-fifths is-offset-one-fifth is-small blog-hero">
                    <div class="hero-body has-text-centered">
                        <div class="container">
                            <h1 class="title">
                                My replies
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-three-fifths is-offset-one-fifth">
                    @if($messages->count())
                        <div class="box">
                            @foreach($messages as $message)
                                <div class="columns is-multiline">
                                    <div class="column">
                                        <div class="card blog-card">
                                            <header class="card-header">
                                                <p class="card-header-title">
                                                    {{ $message->blog->title }}
                                                </p>
                                            </header>
                                            <div class="card-content">
                                                <div class="content">
                                                    {{ $message->body }}
                                                </div>
                                            </div>
                                            <footer class="card-footer">
                                                <a href="{{ route('blog.show', $message->blog->slug) }}" class="card-footer-item">Open blog</a>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="box">
                            <article class="message is-danger">
                                <div class="message-body">
                                    No replies found
                                </div>
                            </article>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
