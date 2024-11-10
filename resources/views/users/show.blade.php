
@extends('Layout.Layout')

@section('title',$user->name)


@section('content')


    <div class="container py-4">
        <div class="row">
            @include('Shared.left-sidebar')
            <div class="col-6">
                @include('Messages.success-message')
                @include('Shared.users-card')
                @include('Shared.Thoughts-card')
            </div>
            <div class="col-3">
                @include('Shared.search-bar')
                @include('Shared.follow-box')
            </div>
        </div>
    </div>

@endsection
