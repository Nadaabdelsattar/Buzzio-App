<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') | {{ Config('app.name') }} </title>

    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-feather me-2">
                </span>{{ Config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest()
                        <li class="nav-item">
                            <a class=" {{ Route::is('login') ? 'active' : '' }} nav-link" aria-current="page"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class=" {{ Route::is('Regiser') ? 'active' : '' }} nav-link"
                                href="{{ route('Regiser') }}">Register</a>
                        </li>
                    @endguest
                    @auth()
                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class=" {{ Route::is('admin.Dashboard') ? 'active' : '' }} nav-link"
                                    href="{{ route('admin.Dashboard') }}">
                                    Admin Dashboard </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class=" {{ Route::is('profile') ? 'active' : '' }} nav-link"
                                href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action=" {{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-small" type="submit"> Logout </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
