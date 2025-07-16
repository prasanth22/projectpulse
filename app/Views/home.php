<!DOCTYPE html>
<html>
<head>
    <title>Welcome to ProjectPulse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f2ff;
            font-family: Arial, sans-serif;
        }
        .header {
            padding: 60px 20px;
            text-align: center;
            background-color: #007bff;
            color: white;
        }
        .header h1 {
            font-size: 3rem;
        }
        .content {
            max-width: 1100px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 123, 255, 0.1);
        }
        .form-card {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .btn-toggle {
            width: 50%;
            border-radius: 0;
        }
        .btn-toggle.active {
            background-color: #007bff;
            color: white;
        }
        footer {
            text-align: center;
            padding: 20px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>ProjectPulse</h1>
    <p>Your Organization's Knowledge Hub for Projects</p>
</div>

<div class="content">
    <div class="row">
        <!-- LEFT SIDE: Description -->
        <div class="col-md-6">
            <h3>Welcome to ProjectPulse</h3>
            <p>
                <strong>ProjectPulse</strong> is a collaborative platform designed specifically for the employees of <strong>NIC</strong> (National Informatics Centre). It's more than just a project showcase — it's your internal knowledge-sharing hub.
            </p>
            <ul>
                <li>💡 Share detailed insights about the projects they are working on</li>
                <li>🧠 Learn from experiences and documentation of ongoing and completed projects</li>
                <li>📚 Discover solutions to common admin and technical queries</li>
                <li>🤝 Collaborate across departments by contributing or following updates</li>
            </ul>
            <p>
                ProjectPulse helps break silos by making project-related information and admin knowledge easily accessible and searchable — empowering everyone to work smarter and more collaboratively.
            </p>
        </div>

        <!-- RIGHT SIDE: Quora-Style Forms -->
        <div class="col-md-6">
            <div class="form-card">
                <div class="d-flex mb-4">
                    <button class="btn btn-toggle active" id="btnLogin" onclick="toggleForm('login')">Login</button>
                    <button class="btn btn-toggle" id="btnRegister" onclick="toggleForm('register')">Register</button>
                </div>

                <!-- Login Form -->
                <div id="loginForm" class="form-section active">
                    <form method="post" action="<?= site_url('/login') ?>">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>

                <!-- Register Form -->
                <div id="registerForm" class="form-section">
                    <form method="post" action="<?= site_url('/register') ?>">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> ProjectPulse. Built for collaboration.
</footer>

<script>
    function toggleForm(type) {
        document.getElementById('loginForm').classList.remove('active');
        document.getElementById('registerForm').classList.remove('active');
        document.getElementById('btnLogin').classList.remove('active');
        document.getElementById('btnRegister').classList.remove('active');

        if (type === 'login') {
            document.getElementById('loginForm').classList.add('active');
            document.getElementById('btnLogin').classList.add('active');
        } else {
            document.getElementById('registerForm').classList.add('active');
            document.getElementById('btnRegister').classList.add('active');
        }
    }
</script>

</body>
</html>
