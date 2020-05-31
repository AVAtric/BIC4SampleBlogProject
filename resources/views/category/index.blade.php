@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <categories :all-categories="{{ $categories->load('blogs') }}" ></categories>
    </section>
@endsection
