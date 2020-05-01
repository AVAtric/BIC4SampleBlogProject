@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <blog-form :is-editable="true" :current-blog="{{ $blog }}"></blog-form>
    </section>
@endsection
