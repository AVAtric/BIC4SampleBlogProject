@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column hero is-info is-bold is-three-fifths is-offset-one-fifth">
                    <div class="hero-body has-text-centered">
                        <div class="container">
                            <h1 class="title">
                                Geiler Titel
                            </h1>
                            <h2 class="subtitle">
                                Bam Bam Bam!
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="box">
                        <blog-list :blog-list="{{ $blogs }}"></blog-list>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
