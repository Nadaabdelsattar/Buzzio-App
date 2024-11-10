@if (count($Thoughts) > 0)

    @foreach ($Thoughts as $Thought)
        <div class="mt-3">
            <div class="card">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                src="{{ $Thought->user->getImageURL() }}" alt="{{ $Thought->user->getImageURL() }}">
                            <div>
                                <h5 class="card-title mb-0"><a href="{{ route('users.show', $Thought->user->id) }}">
                                        {{ $Thought->user->name }}
                                    </a></h5>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href=" {{ route('Thoughts.show', $Thought->id) }} "> View </a>
                            @auth
                                @can('update', $Thought)
                                    <a class="mx-2" href=" {{ route('Thoughts.edit', $Thought->id) }} "> Edit </a>
                                    <form method="POST" action=" {{ route('Thoughts.destroy', $Thought->id) }} ">
                                        @csrf
                                        @method('delete')
                                        <button class=" ms-1 btn btn-danger btn-sm"> X </button>
                                    </form>
                                @endcan
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="fs-6 fw-light text-muted">
                        {{ $Thought->content }}
                    </p>
                    <div class="d-flex justify-content-between">
                        @include('Thoughts.Shared.like-button')
                        <div>
                            <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                {{ $Thought->created_at->diffForHumans() }} </span>
                        </div>
                    </div>
                    @include('Shared.comments-box')
                </div>
            </div>
        </div>
    @endforeach
@else
    <P class=" text-center my-4"> No Results Found </P>
@endif
<div class="mt-3">
    {{ $Thoughts->withQueryString()->links() }}
</div>
