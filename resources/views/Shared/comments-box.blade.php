<div>
    <div>
        <form action=" {{ route('Thoughts.comments.store', $Thought->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
            </div>
        </form>
    </div>
    <hr>
    @forelse ($Thought->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->getImageURL() }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <a class="h6 mb-0" href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <P class=" text-center my-4"> No Comments Found </P>
    @endforelse
</div>
