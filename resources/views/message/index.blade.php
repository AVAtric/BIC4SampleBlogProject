@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <replies :all-replies="{{ $messages->load('blog')->sortByDesc('created_at') }}"></replies>
    </section>
@endsection
