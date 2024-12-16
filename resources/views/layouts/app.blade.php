<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Booking Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Ensure the pagination SVG arrows have correct dimensions */
        .pagination svg {
            width: 16px !important;
            height: 16px !important;
        }

        /* Adjust Bootstrap pagination links to override any conflicting Tailwind styles */
        .pagination .relative.inline-flex.items-center {
            font-size: 14px !important;
            padding: 6px 10px !important;
            line-height: 1.5 !important;
        }

        /* Additional spacing for consistency */
        .container {
            margin-top: 20px;
        }

        /* Navbar styling adjustment if needed */
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar .nav-link {
            font-size: 1rem;
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #f8f9fa;
        }
    </style>
@stack('styles') <!-- Allow additional styles to be pushed from child views -->
</head>
<body>
<!-- Navbar -->
@include('partials.navbar') <!-- Include the navbar partial for modularity -->

<!-- Main Content -->
<div class="container">
@yield('content') <!-- Dynamic content will be injected here -->
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts') <!-- Allow additional scripts to be pushed from child views -->
</body>
</html>
