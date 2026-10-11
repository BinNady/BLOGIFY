<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGIFY</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/css/style.css'])
</head>
<body class="font-sans text-gray-900 antialiased bg-blue-50">
    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner mt-16">
        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-gray-500 font-medium">
            &copy; {{ date('Y') }} Blogify. All rights reserved.
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>
