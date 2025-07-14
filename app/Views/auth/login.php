<!DOCTYPE html>
<html>
<head>
    <title>Login - ProjectPulse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.1);
        }
        .brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">ProjectPulse</div>
        <h4 class="mb-3 text-center">Login to your account</h4>
        <form method="post" action="/auth/loginSubmit">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <button class="btn btn-primary w-100">Login</button>
        </form>
        <div class="mt-3 text-center">
            <small>Don't have an account? <a href="/register">Register</a></small>
        </div>
    </div>
</body>
</html>
