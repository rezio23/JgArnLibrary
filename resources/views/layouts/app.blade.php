<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #1a1a2e;
            color: #fff;
        }
        .sidebar .nav-link {
            color: #b8c1cc;
            padding: 12px 20px;
            border-radius: 0;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #16213e;
        }
        .topbar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <h4 class="text-center py-3 border-bottom border-secondary">
                        <i class="bi bi-book-half"></i> JgArn Library
                    </h4>
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item">
                            <a class="nav-link @yield('nav-dashboard', '')" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('nav-books', '')" href="{{ route('books.index') }}">
                                <i class="bi bi-book"></i> Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('nav-categories', '')" href="{{ route('categories.index') }}">
                                <i class="bi bi-tags"></i> Categories
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="topbar d-flex justify-content-between align-items-center p-3">
                    <button class="btn btn-outline-dark d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="ms-auto d-flex align-items-center gap-2">
                        <i class="bi bi-person-circle fs-4"></i>
                        <span>{{ Auth::user()->name ?? 'Guest' }}</span>
                    </div>
                </div>

                <div class="main-content p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
