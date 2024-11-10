<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{ route('users.update', $user->id) }}"  method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="{{ $user->getImageURL() }}">

                    <div>
                        <input name="name" class="form-control" value=" {{ $user->name }} " type="text">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2 mb-2"> {{ $message }} </span>
                        @enderror
                    </div>

                </div>
                <div>
                    @auth()
                        @if (Auth::id() === $user->id)
                            <a href=" {{ route('users.show', $user->id) }} ">View</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="my-3">
                <label>Profile Picture</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <span class="d-block fs-6 text-danger mt-2 mb-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>

                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3"></textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2 mb-2"> {{ $message }} </span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-small mb-2">Save</button>

                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->thought()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
