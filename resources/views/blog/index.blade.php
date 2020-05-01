@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <blogs :all-blogs="{{ $blogs }}" :current-user="{{ Auth::user() }}"></blogs>
    </section>
@endsection
