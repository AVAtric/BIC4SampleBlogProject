@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <blog :current-blog="{{ $blog->load('user') }}"
              :current-messages="{{ $blog->messages->load('user')->sortByDesc('created_at') }}"></blog>
    </section>
@endsection
