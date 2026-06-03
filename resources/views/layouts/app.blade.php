
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Library Management System')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-body: #0a0a0a;
      --bg-sidebar: #000000;
      --bg-content: #f4f4f5;
      --bg-card: #ffffff;
      --bg-hover: #f9fafb;
      --bg-input: #fafafa;
      --border: #e4e4e7;
      --border-light: #f0f0f1;
      --text-primary: #09090b;
      --text-secondary: #52525b;
      --text-muted: #a1a1aa;
      --accent: #18181b;
      --accent-hover: #27272a;
      --danger: #7f7f7f;
      --shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.02);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.03), 0 2px 4px -1px rgba(0,0,0,0.02);
    }

    * { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
    html, body {
      background: var(--bg-content);
      color: var(--text-primary);
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
    }

    /* Sidebar states */
    .sidebar {
      background: var(--bg-sidebar);
      min-height: 100vh;
      position: fixed;
      top: 0; left: 0;
      width: 260px;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      border-right: 1px solid #1a1a1a;
      transition: width 0.3s ease;
    }
    .sidebar-brand {
      padding: 28px 28px 20px;
      border-bottom: 1px solid #1a1a1a;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .sidebar-brand a {
      color: #ffffff;
      font-size: 1.15rem;
      font-weight: 600;
      letter-spacing: -0.02em;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      overflow: hidden;
      white-space: nowrap;
    }
    .sidebar-brand-text {
      transition: opacity 0.2s ease;
    }
    .sidebar-toggle-btn {
      background: transparent;
      border: 1px solid #2a2a2a;
      color: #9ca3af;
      width: 32px;
      height: 32px;
      border-radius: 8px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.15s ease;
      font-size: 1rem;
      padding: 0;
      flex-shrink: 0;
    }
    .sidebar-toggle-btn:hover {
      background: #141414;
      color: #ffffff;
      border-color: #3a3a3a;
    }
    .sidebar-menu {
      padding: 16px 14px;
      flex: 1;
    }
    .sidebar-menu .nav-link {
      color: #9ca3af;
      padding: 11px 16px;
      border-radius: 8px;
      font-size: 0.875rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.15s ease;
      margin-bottom: 2px;
      border: none;
      background: transparent;
      width: 100%;
      text-align: left;
      overflow: hidden;
      white-space: nowrap;
    }
    .sidebar-menu .nav-link:hover {
      color: #ffffff;
      background: #141414;
    }
    .sidebar-menu .nav-link.active {
      color: #ffffff;
      background: #18181b;
      font-weight: 600;
    }
    .sidebar-menu .nav-link i {
      font-size: 1.15rem;
      min-width: 24px;
      text-align: center;
      flex-shrink: 0;
    }
    .sidebar-menu .nav-link span {
      transition: opacity 0.2s ease;
    }
    .sidebar-footer {
      padding: 16px;
      border-top: 1px solid #1a1a1a;
    }
    .sidebar-footer .user-pill {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 14px;
      background: #111111;
      border-radius: 10px;
      border: 1px solid #1f1f1f;
    }
    .sidebar-footer .user-pill i {
      color: #ffffff;
      font-size: 1.15rem;
      min-width: 24px;
      text-align: center;
      flex-shrink: 0;
    }
    .sidebar-footer .user-pill span {
      color: #e4e4e7;
      font-size: 0.8rem;
      font-weight: 500;
      transition: opacity 0.2s ease;
    }

    /* Collapsed sidebar */
    body.sidebar-collapsed .sidebar {
      width: 64px;
    }
    body.sidebar-collapsed .sidebar-brand {
      padding: 20px 16px 16px;
      justify-content: center;
    }
    body.sidebar-collapsed .sidebar-brand a {
      display: none;
    }
    body.sidebar-collapsed .sidebar-menu {
      padding: 16px 10px;
    }
    body.sidebar-collapsed .sidebar-menu .nav-link {
      padding: 11px;
      justify-content: center;
      gap: 0;
    }
    body.sidebar-collapsed .sidebar-menu .nav-link span {
      opacity: 0;
      width: 0;
      display: none;
    }
    body.sidebar-collapsed .sidebar-footer {
      padding: 16px 10px;
    }
    body.sidebar-collapsed .sidebar-footer .user-pill {
      padding: 10px;
      justify-content: center;
    }
    body.sidebar-collapsed .sidebar-footer .user-pill span {
      opacity: 0;
      width: 0;
      display: none;
    }
    body.sidebar-collapsed .sidebar-footer .nav-link {
      padding: 10px !important;
      justify-content: center !important;
      gap: 0 !important;
    }
    body.sidebar-collapsed .sidebar-footer .nav-link span {
      opacity: 0;
      width: 0;
      display: none;
    }
    body.sidebar-collapsed .main-wrap {
      margin-left: 64px;
      max-width: calc(100vw - 64px);
    }

    .main-wrap {
      margin-left: 260px;
      min-height: 100vh;
      max-width: calc(100vw - 260px);
      overflow-x: hidden;
      transition: margin-left 0.3s ease, max-width 0.3s ease;
    }
    .topbar {
      background: var(--bg-card);
      border-bottom: 1px solid var(--border);
      padding: 16px 32px;
      position: sticky;
      top: 0;
      z-index: 900;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .topbar h1 {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--text-primary);
      margin: 0;
      letter-spacing: -0.01em;
    }
    .page-content {
      padding: 32px;
      max-width: 100%;
      overflow-x: hidden;
    }

    .page-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;

      background: var(--bg-content);
      padding: 16px 0;
    }
    .page-header h2 {
      margin: 0;
    }

    .card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 12px;
      box-shadow: var(--shadow);
      overflow: hidden;
    }
    .card-header {
      background: transparent;
      border-bottom: 1px solid var(--border-light);
      padding: 18px 24px;
    }
    .card-body { padding: 24px; }
    .card-footer {
      background: transparent;
      border-top: 1px solid var(--border-light);
      padding: 14px 24px;
    }

    .stat-card {
      padding: 28px;
      border: 1px solid var(--border);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }
    .stat-card .stat-icon {
      width: 44px; height: 44px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: #f4f4f5;
      border-radius: 10px;
      margin-bottom: 16px;
    }
    .stat-card .stat-icon i { font-size: 1.25rem; color: #18181b; }
    .stat-card .stat-label {
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.04em;
      margin-bottom: 6px;
    }
    .stat-card .stat-value {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text-primary);
      letter-spacing: -0.02em;
    }

    .table {
      --bs-table-bg: transparent;
      --bs-table-color: var(--text-primary);
      margin-bottom: 0;
    }
    .table thead th {
      background: #fafafa;
      color: var(--text-muted);
      font-size: 0.7rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      padding: 14px 20px;
      border-bottom: 1px solid var(--border);
      border-top: none;
      white-space: nowrap;
      position: sticky;
      top: 57px;
      z-index: 800;
    }
    .table tbody td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border-light);
      vertical-align: middle;
      font-size: 0.875rem;
      color: var(--text-secondary);
      max-width: 300px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    .table tbody td:first-child { max-width: 80px; }
    .table tbody td:last-child {
      max-width: none;
      white-space: nowrap;
    }
    .table tbody tr:last-child td { border-bottom: none; }
    .table tbody tr:hover td { background: var(--bg-hover); }

    .btn {
      font-size: 0.8125rem;
      font-weight: 500;
      padding: 8px 16px;
      border-radius: 8px;
      transition: all 0.15s ease;
      letter-spacing: 0.01em;
    }
    .btn-primary {
      background: var(--accent);
      border: 1px solid var(--accent);
      color: #fff;
    }
    .btn-primary:hover {
      background: var(--accent-hover);
      border-color: var(--accent-hover);
      color: #fff;
    }
    .btn-secondary {
      background: #fff;
      border: 1px solid var(--border);
      color: var(--text-secondary);
    }
    .btn-secondary:hover {
      background: var(--bg-hover);
      border-color: #d4d4d8;
      color: var(--text-primary);
    }
    .btn-outline-primary {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--text-primary);
    }
    .btn-outline-primary:hover {
      background: var(--text-primary);
      border-color: var(--text-primary);
      color: #fff;
    }
    .btn-outline-danger {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--text-secondary);
    }
    .btn-outline-danger:hover {
      background: #18181b;
      border-color: #18181b;
      color: #fff;
    }
    .btn-sm { padding: 6px 12px; font-size: 0.75rem; }
    .btn-lg { padding: 10px 20px; font-size: 0.875rem; }

    .form-label {
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--text-secondary);
      margin-bottom: 6px;
    }
    .form-control, .form-select {
      background: var(--bg-input);
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 0.875rem;
      color: var(--text-primary);
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    .form-control:focus, .form-select:focus {
      background: #fff;
      border-color: #18181b;
      box-shadow: 0 0 0 3px rgba(24,24,27,0.06);
      outline: none;
    }
    .form-control::placeholder { color: var(--text-muted); }
    textarea.form-control { min-height: 120px; resize: vertical; }
    .is-invalid, .form-control.is-invalid, .form-select.is-invalid {
      border-color: #7f7f7f !important;
    }
    .invalid-feedback {
      color: #52525b;
      font-size: 0.78rem;
      margin-top: 4px;
    }

    .alert {
      border: none;
      border-radius: 10px;
      padding: 14px 18px;
      font-size: 0.875rem;
    }
    .alert-success {
      background: #f4f4f5;
      color: #27272a;
      border-left: 3px solid #18181b;
    }
    .alert-danger {
      background: #f4f4f5;
      color: #52525b;
      border-left: 3px solid #a1a1aa;
    }
    .alert .btn-close {
      width: 24px; height: 24px;
      padding: 0;
      opacity: 0.4;
    }
    .alert .btn-close:hover { opacity: 0.7; }

    .modal-content {
      border: 1px solid var(--border);
      border-radius: 14px;
      box-shadow: 0 20px 25px -5px rgba(0,0,0,0.08), 0 10px 10px -5px rgba(0,0,0,0.02);
    }
    .modal-header {
      border-bottom: 1px solid var(--border-light);
      padding: 20px 24px;
    }
    .modal-title { font-size: 1rem; font-weight: 600; }
    .modal-body { padding: 20px 24px; font-size: 0.875rem; color: var(--text-secondary); }
    .modal-footer {
      border-top: 1px solid var(--border-light);
      padding: 14px 24px;
    }

    .pagination { gap: 4px; }
    .page-link {
      border: 1px solid var(--border);
      color: var(--text-secondary);
      border-radius: 8px !important;
      padding: 7px 14px;
      font-size: 0.8rem;
      font-weight: 500;
    }
    .page-link:hover {
      background: var(--bg-hover);
      border-color: #d4d4d8;
      color: var(--text-primary);
    }
    .page-item.active .page-link {
      background: var(--text-primary);
      border-color: var(--text-primary);
      color: #fff;
    }
    .page-item.disabled .page-link {
      color: var(--text-muted);
      background: var(--bg-hover);
    }

    .text-muted { color: var(--text-muted) !important; }
    h2 { font-size: 1.35rem; font-weight: 700; letter-spacing: -0.02em; }
    .breadcrumb-item + .breadcrumb-item::before { color: var(--text-muted); }

    @media (max-width: 767px) {
      .sidebar {
        position: relative;
        width: 100%;
        min-height: auto;
        transform: none !important;
      }
      body.sidebar-collapsed .sidebar {
        width: 100%;
      }
      .main-wrap { margin-left: 0; max-width: 100vw; }
      body.sidebar-collapsed .main-wrap {
        margin-left: 0;
        max-width: 100vw;
      }
      .topbar { padding: 14px 20px; }
      .page-content { padding: 20px; }
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">
    <div class="row g-0">
      <nav class="sidebar d-none d-md-flex">
        <div class="sidebar-brand">
          <a href="{{ route('dashboard') }}">
            <i class="bi bi-book-half"></i>
            <span class="sidebar-brand-text">JgArn Library</span>
          </a>
          <button class="sidebar-toggle-btn" id="sidebarToggle" type="button">
            <i class="bi bi-list"></i>
          </button>
        </div>
        <div class="sidebar-menu">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link @yield('nav-dashboard', '')" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('nav-books', '')" href="{{ route('books.index') }}">
                <i class="bi bi-book"></i>
                <span>Books</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('nav-borrowings', '')" href="{{ route('borrowings.index') }}">
                <i class="bi bi-arrow-left-right"></i>
                <span>Borrowings</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('nav-categories', '')" href="{{ route('categories.index') }}">
                <i class="bi bi-tags"></i>
                <span>Categories</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="sidebar-footer">
          <form action="{{ route('logout') }}" method="POST" class="mb-0">
            @csrf
            <button type="button" class="nav-link w-100" style="padding: 10px 14px; border-radius: 8px; color: #9ca3af; font-size: 0.875rem; font-weight: 500; display: flex; align-items: center; gap: 10px;" data-bs-toggle="modal" data-bs-target="#confirmModal" data-confirm-message="Are you sure you want to logout?">
              <i class="bi bi-box-arrow-right"></i>
              <span>Logout</span>
            </button>
          </form>
          <div class="user-pill mt-2">
            <i class="bi bi-person-circle"></i>
            <span>{{ Auth::user()->name ?? 'Guest' }}</span>
          </div>
        </div>
      </nav>

      <div class="main-wrap">
        <div class="topbar">
          <div style="width: 40px;"></div>
          <h1>@yield('title', 'Library Management System')</h1>
          <div style="width: 40px;"></div>
        </div>

        <div class="page-content">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
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

  <div class="collapse d-md-none" id="sidebarMenu">
    <nav class="sidebar" style="position: relative; width: 100%;">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
          <i class="bi bi-book-half"></i>
          <span class="sidebar-brand-text">JgArn Library</span>
        </a>
      </div>
      <div class="sidebar-menu">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @yield('nav-dashboard', '')" href="{{ route('dashboard') }}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('nav-books', '')" href="{{ route('books.index') }}">
              <i class="bi bi-book"></i>
              <span>Books</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('nav-categories', '')" href="{{ route('categories.index') }}">
              <i class="bi bi-tags"></i>
              <span>Categories</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST" class="mb-0">
          @csrf
          <button type="button" class="nav-link w-100" style="padding: 10px 14px; border-radius: 8px; color: #9ca3af; font-size: 0.875rem; font-weight: 500; display: flex; align-items: center; gap: 10px;" data-bs-toggle="modal" data-bs-target="#confirmModal" data-confirm-message="Are you sure you want to logout?">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </button>
        </form>
        <div class="user-pill mt-2">
          <i class="bi bi-person-circle"></i>
          <span>{{ Auth::user()->name ?? 'Guest' }}</span>
        </div>
      </div>
    </nav>
  </div>

  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Confirm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="confirmModalBody">Are you sure?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="confirmModalYes">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
      document.body.classList.toggle('sidebar-collapsed');
    });

    const confirmModal = document.getElementById('confirmModal');
    const confirmModalBody = document.getElementById('confirmModalBody');
    const confirmModalYes = document.getElementById('confirmModalYes');
    let confirmTargetForm = null;

    confirmModal.addEventListener('show.bs.modal', function (event) {
      const trigger = event.relatedTarget;
      confirmModalBody.textContent = trigger.getAttribute('data-confirm-message') || 'Are you sure?';
      confirmTargetForm = trigger.closest('form');
    });

    confirmModalYes.addEventListener('click', function () {
      if (confirmTargetForm) {
        confirmTargetForm.submit();
      }
      bootstrap.Modal.getInstance(confirmModal).hide();
    });
  </script>
</body>
</html>
