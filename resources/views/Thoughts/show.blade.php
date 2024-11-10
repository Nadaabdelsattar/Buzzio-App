
@extends('Layout.Layout')

@section('title','View Thought')


@section('content')


    <div class="container py-4">
        <div class="row">
            @include('Shared.left-sidebar')
            <div class="col-6">
                @include('Messages.success-message')
                <div class="mt-3">
                    <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                        src="{{ $Thought->user->getImageURL() }}" alt="{{ $Thought->user->getImageURL() }}">
                                    <div>
                                        <h5 class="card-title mb-0"><a href="#"> {{ $Thought->user->name }}
                                            </a></h5>
                                    </div>
                                </div>
                                <div>
                                    <form method="POST" action=" {{ route('Thoughts.destroy', $Thought->id) }} ">
                                        @csrf
                                        @method('delete')
                                        <a class="mx-2" href=" {{ route('Thoughts.edit', $Thought->id) }} "> Edit </a>
                                        <button class="btn btn-danger btn-sm"> X </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($editing ?? false)
                                <form action="{{ route('Thoughts.update', $Thought->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <textarea name="content" class="form-control" id="content" rows="3"> {{ $Thought->content }} </textarea>
                                    </div>

                                    @error('content')
                                        <span class="d-block fs-6 text-danger mt-2 mb-2"> {{ $message }} </span>
                                    @enderror

                                    <div class="">
                                        <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update </button>
                                    </div>
                                </form>
                            @else
                            <p class="fs-6 fw-light text-muted">
                                {{ $Thought->content }}
                            </p>
                            @endif
                            <div class="d-flex justify-content-between">
                                <div>
                                    @include('Thoughts.Shared.like-button')
                                </div>
                                <div>
                                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                        {{ $Thought->created_at->diffForHumans() }} </span>
                                </div>
                            </div>
                            @include('Shared.comments-box')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                @include('Shared.search-bar')
                @include('Shared.follow-box')
            </div>
        </div>
    </div>

@endsection
