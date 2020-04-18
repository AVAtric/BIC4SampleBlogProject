@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column hero is-bold is-info is-three-fifths is-offset-one-fifth is-small blog-hero">
                    <div class="hero-body has-text-centered">
                        <div class="container">
                            <h1 class="title">
                                Blogs
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-three-fifths is-offset-one-fifth">
                    @if($blogs->count())
                        <div class="box custom-box">
                            <blog-list :blog-list="{{ $blogs }}"></blog-list>
                        </div>
                    @else
                        <div class="box">
                            <article class="message is-danger">
                                <div class="message-body">
                                    No blogs found
                                </div>
                            </article>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
