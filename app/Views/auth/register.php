<!DOCTYPE html>
<html>
<head>
    <title>Register - ProjectPulse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-card {
            width: 100%;
            max-width: 450px;
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
    <div class="register-card">
        <div class="brand">ProjectPulse</div>
        <h4 class="mb-3 text-center">Create a new account</h4>
        <form method="post" action="/auth/registerSubmit">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-primary w-100">Register</button>
        </form>
        <div class="mt-3 text-center">
            <small>Already have an account? <a href="/login">Login</a></small>
        </div>
    </div>
</body>
</html>
