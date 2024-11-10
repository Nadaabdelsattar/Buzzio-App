@extends('Layout.Layout')

@section('title', 'Admin Dashboard')


@section('content')

    <div class="container py-4">
        <div class="row">

            @include('Admin.Shared.left-sidebar')

            <div class="col-9">
                <h1>Dashboard</h1>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        @include('Admin.Shared.widget', [
                            'title' => 'Total Users',
                            'icon' => 'fas fa-users',
                            'data' => $TotalUsers,
                        ])
                    </div>
                    <div class="col-sm-6 col-md-4">
                        @include('Admin.Shared.widget', [
                            'title' => 'Total Thoughts',
                            'icon' => 'fas fa-lightbulb',
                            'data' => $TotalThoughts,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
