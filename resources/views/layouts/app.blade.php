<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truck Booking Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Ensure the pagination SVG arrows have correct dimensions */
        .pagination{
                border:1px solid red!important
        }

        .pagination svg {
            width: 16px !important;
            height: 16px !important;
        }

        /* Adjust Bootstrap pagination links to override any conflicting Tailwind styles */
        .pagination .relative.inline-flex.items-center {
            font-size: 14px !important; /* Adjust font size for consistent look */
            padding: 6px 10px !important;
            line-height: 1.5 !important;
        }
    </style>

</head>
<body>
@include('partials.navbar') <!-- Ensure this path is correct -->

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
