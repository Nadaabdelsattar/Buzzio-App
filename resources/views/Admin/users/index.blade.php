@extends('Layout.Layout')

@section('title','Users | Admin Dashboard')


@section('content')

<div class="container py-4">
    <div class="row">

            @include('Admin.Shared.left-sidebar')

        <div class="col-9">
            <h1>Users</h1>

            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->toDateString() }}</td>
                        <td>
                            <a href=" {{route('users.show', $user->id)}} ">View {{$user->name}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                {{$users->links()}}
            </div>

        </div>
    </div>
</div>
@endsection
