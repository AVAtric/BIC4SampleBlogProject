@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="panel column is-half is-offset-one-quarter">
                    <div class="panel-heading">
                        <div class="level">
                            <div class="level-left">
                                <p class="level-item has-text-centered">
                                    {{ $blog->title }}
                                </p>
                            </div>
                            <div class="level-right">
                                <p class="level-item has-text-centered">
                                    {{ $blog->created_at->toDateTimeString() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <p class="panel-block">
                        {{ $blog->body }}
                    </p>
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
            <div class="columns is-multiline">
                <div class="column is-half is-offset-one-quarter">
                    <form>
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input" type="text" placeholder="Find a repository">
                            </p>
                            <p class="control">
                                <button type="submit" class="button is-info">
                                    Search
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
