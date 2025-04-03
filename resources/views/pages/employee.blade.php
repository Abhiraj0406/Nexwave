<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ auth()->user()->role }} Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Sidebar Container -->
    <div class="fixed h-screen flex">
        <!-- Sidebar -->
        <x-navbar/>
        {{-- @auth
        @endauth --}}
        <p class="m-52">Employee details</p>
    </div>
</body>
</html>
