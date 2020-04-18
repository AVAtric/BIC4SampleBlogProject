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
                        <form>
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <input class="input" type="text" placeholder="What do you think about this...">
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
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">Time ago</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">Created at</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
