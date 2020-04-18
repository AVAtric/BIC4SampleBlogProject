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
                    <div class="box custom-box">
                        <blog-list :blog-list="{{ $blogs }}"></blog-list>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
