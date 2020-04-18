@extends('layouts.app')

@section('content')
    <section class="section is-fullwidth">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <article class="panel">
                        <div class="panel-heading">
                            <div class="level">
                                <div class="level-left">
                                    <h1 class="level-item has-text-centered">
                                        {{ $blog->title }}
                                    </h1>
                                </div>
                                <div class="level-right">
                                    <p class="level-item has-text-centered">
                                        <small>{{ $blog->user->name }}&nbsp;{{ $blog->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p class="panel-block">
                            {{ $blog->body }}
                        </p>
                    </article>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <div class="box">
                        <form method="POST" action="{{ route('message.store') }}">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <input class="input" name="body" type="text" placeholder="What do you think about this...">
                                </p>
                                <p class="control">
                                    <button type="submit" class="button is-info">
                                        Send
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($blog->messages->count())
                @foreach($blog->messages as $message)
                <div class="columns is-multiline">
                    <div class="column is-half is-offset-one-quarter">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">{{ $message->user->name }}</p>
                                        <p class="subtitle is-6">{{ $message->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                                <div class="content">
                                    {{ $message->body }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="columns is-multiline">
                    <div class="column is-half is-offset-one-quarter">
                        <div class="box">
                            <article class="message is-danger">
                                <div class="message-body">
                                    No Messages found
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
