@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <message-form :current-message="{{ $message }}" blog-title="{{ $message->blog->title }}"></message-form>
    </section>
@endsection
