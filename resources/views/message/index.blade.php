@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <div class="container">
            <hero main-title="My Replies"></hero>
            <div class="columns is-multiline">
                <div class="column is-three-fifths is-offset-one-fifth">
                    @if($messages->count())
                        <message-list :my-messages="{{ $messages->load('blog')->sortByDesc('created_at') }}"></message-list>
                    @else
                        <div class="box">
                            <article class="message is-danger">
                                <div class="message-body">
                                    No replies found
                                </div>
                            </article>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
