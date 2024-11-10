@extends('Layout.Layout')

@section('title','Terms')


@section('content')
    <div class="container py-4">
        <div class="row">

                @include('Shared.left-sidebar')

            <div class="col-6 mt-3">
                <h1>Terms</h1>
                <div>
                    A Buzzio app is a social media platform replicating core functionalities of Thoughts, enabling users to
                    post
                    short updates (Thoughts), follow other users, and interact with content through likes, and comments.
                    Built
                    with a responsive design, this app often includes a profile management, and notification
                    systems.
                </div>
            </div>
            <div class="col-3">
                @include('Shared.search-bar')
                @include('Shared.follow-box')
            </div>
        </div>
    </div>
@endsection
