@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <blogs :all-blogs="{{ $blogs }}"></blogs>
    </section>
@endsection
