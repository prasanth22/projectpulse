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
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 123, 255, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            margin: 10px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
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
    <h3>Welcome to ProjectPulse</h3>
    <p>
        <strong>ProjectPulse</strong> is a collaborative platform designed specifically for the employees of <strong>NIC</strong> (National Informatics Centre). It's more than just a project showcase — it's your internal knowledge-sharing hub.
    </p>
    
    <p>
        Here, employees can:
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

    <div class="text-center">
        <a href="/login" class="btn btn-custom btn-lg">Login</a>
        <a href="/register" class="btn btn-outline-primary btn-lg">Register</a>
    </div>
</div>


    <footer>
        &copy; <?= date('Y') ?> ProjectPulse. Built for collaboration.
    </footer>

</body>
</html>
