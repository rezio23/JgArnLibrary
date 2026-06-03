<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - JgArn Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #0a0a0a;
            --bg-card: #111111;
            --border: #1f1f1f;
            --text-primary: #fafafa;
            --text-secondary: #a1a1aa;
            --text-muted: #71717a;
            --accent: #ffffff;
            --accent-hover: #e4e4e7;
        }
        * { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
        body {
            background: var(--bg-body);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }
        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        .login-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px 36px;
            box-shadow: 0 0 0 1px rgba(255,255,255,0.03), 0 20px 40px rgba(0,0,0,0.4);
        }
        .login-brand {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-brand i {
            font-size: 2.5rem;
            color: #ffffff;
            margin-bottom: 12px;
            display: inline-block;
        }
        .login-brand h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.02em;
            margin-bottom: 4px;
        }
        .login-brand p {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin: 0;
        }
        .form-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }
        .form-control {
            background: #0a0a0a;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 0.875rem;
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
        .form-control:focus {
            background: #0a0a0a;
            border-color: #52525b;
            box-shadow: 0 0 0 3px rgba(82,82,91,0.15);
            color: var(--text-primary);
            outline: none;
        }
        .form-control::placeholder { color: var(--text-muted); }
        .btn-login {
            background: var(--accent);
            border: 1px solid var(--accent);
            color: #000000;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            transition: all 0.2s ease;
            letter-spacing: 0.01em;
        }
        .btn-login:hover {
            background: var(--accent-hover);
            border-color: var(--accent-hover);
            color: #000000;
        }
        .alert-danger {
            background: #1a1a1a;
            color: #a1a1aa;
            border: 1px solid #2a2a2a;
            border-radius: 10px;
            font-size: 0.8125rem;
            padding: 12px 16px;
        }
        .alert-danger ul { margin: 0; padding-left: 18px; }
        .hint-text {
            text-align: center;
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 20px;
        }
        .input-icon-wrap {
            position: relative;
        }
        .input-icon-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        .input-icon-wrap .form-control {
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <i class="bi bi-book-half"></i>
                <h3>JgArn Library</h3>
                <p>Admin Login</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-icon-wrap">
                        <i class="bi bi-envelope"></i>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="admin@jgarn.com" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-icon-wrap">
                        <i class="bi bi-lock"></i>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">Sign In</button>
            </form>

            <div class="hint-text">
                Default: admin@gmail.com / Admin123
            </div>
        </div>
    </div>
</body>
</html>
