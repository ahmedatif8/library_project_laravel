<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Online Library Management System</title>
    <style>
    .hero-section {
        position: relative;
        min-height: 60vh;
        color: #fff;
    }

    .hero-section .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Adjust the opacity for subtleness */
    }

    .hero-section .container {
        position: relative;
        z-index: 2;
    }
</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Library System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2"> Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">register</a>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section" style="background-image: url('path-to-your-image.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="overlay"></div>
    <div class="container text-center py-5">
        <h1 class="text-white">Welcome to the Online Library Management System</h1>
        <p class="text-white-50">Your portal for accessing and managing books online</p>
        <a href="#" class="btn btn-primary btn-lg">Explore Books</a>
        <a href="#" class="btn btn-outline-primary btn-lg">Admin Dashboard</a>
    </div>
</div>

    <!-- Features Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h3>For Students</h3>
                <ul>
                    <li>Borrow Books</li>
                    <li>View Borrowed Books</li>
                    <li>Manage Profile</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>For Admins</h3>
                <ul>
                    <li>Manage Books</li>
                    <li>View Users</li>
                    <li>Dashboard Overview</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Online Library Management System. All rights reserved.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-white me-4">Privacy Policy</a>
                <a href="#" class="text-white">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
