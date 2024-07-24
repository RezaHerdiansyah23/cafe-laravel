<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Langkah Kopi')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Langkah Kopi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('menus.index') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menus.create') }}">Add Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">View Orders</a>
                </li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.orders.approved') }}">Approved Orders</a>
</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order') }}">Order Menu</a>
                </li>
                @if(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @endif
                @if(Auth::guard('web')->check())
                    <li class="nav-item">
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
