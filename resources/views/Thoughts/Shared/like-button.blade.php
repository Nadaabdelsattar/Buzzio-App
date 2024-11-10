<div>
    @auth
        @if (Auth::user()->likesThoughts($Thought))
            <form method="POST" action=" {{ route('Thoughts.unlike', $Thought->id) }} ">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $Thought->likes()->count() }} </button>
            </form>
        @else
            <form method="POST" action=" {{ route('Thoughts.like', $Thought->id) }} ">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $Thought->likes()->count() }} </button>
            </form>
        @endif
    @endauth

    @guest
        <a href=" {{ route('login') }} " class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $Thought->likes()->count() }} </a>
    @endguest
</div>
