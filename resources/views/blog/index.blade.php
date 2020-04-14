@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <blog-list :blog-list="{{ $blogs }}"></blog-list>
                </div>
            </div>
        </div>
    </section>
@endsection
