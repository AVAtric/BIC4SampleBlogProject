@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <category :category="{{ $category }}" :user="{{ Auth::user() }}" :blogs="{{ $category->blogs->load(['user','messages']) }}"></category>
    </section>
@endsection
