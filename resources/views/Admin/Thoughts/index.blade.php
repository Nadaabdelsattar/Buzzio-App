@extends('Layout.Layout')

@section('title','Thoughts | Admin Dashboard')


@section('content')

<div class="container py-4">
    <div class="row">

            @include('Admin.Shared.left-sidebar')

        <div class="col-9">
            <h1>Thoughts</h1>

            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Thoughts as $Thought)
                    <tr>
                        <td>{{ $Thought->id }}</td>
                        <td>{{ $Thought->user->name }}</td>
                        <td>{{ $Thought->content }}</td>
                        <td>{{ $Thought->created_at->toDateString() }}</td>
                        <td>
                            <a href=" {{route('Thoughts.show', $Thought->id)}} ">View {{$Thought->user->name}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                {{$Thoughts->links()}}
            </div>

        </div>
    </div>
</div>
@endsection
