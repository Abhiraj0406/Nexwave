<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="group w-20 hover:w-64 transition-all duration-300 bg-white shadow-md overflow-hidden">
        <div class="px-4 py-4 flex flex-col items-center">
            <!-- Logo (Always visible) -->
            <div class="mb-4 cursor-pointer">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9HW5d0CE0GF-nN-jk99xLCdOK8X3ImrEo6ogMOEKJX71ugVTaZIKpfNeDqlVsNxup7lI&usqp=CAU"
                    alt="Logo" class="w-10 h-10 rounded-full">
            </div>
            <!-- Nav Items -->
            <ul class="mt-4 space-y-4 w-full">
                <li class="px-1 py-2 hover:bg-gray-200 transition">
                    <a href="/home" class="flex items-center space-x-3">
                        <i class="fas fa-home text-xl"></i>
                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Home</span>
                    </a>
                </li>
                <li class="px-2 py-2 hover:bg-gray-200 transition">
                    <a href="/dashboard" class="flex items-center space-x-3">
                        {{-- <i class="fa-solid fa-clipboard text-xl"></i> --}}
                        <i class="fa fa-tachometer text-xl"></i>
                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Dashboard</span>
                    </a>
                </li>
                <li class="px-2 py-2 hover:bg-gray-200 transition">
                    <a href="/profile" class="flex items-center space-x-3">
                        <i class="fa-solid fa-user-tie text-xl"></i>
                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Profile</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="px-1 py-2 hover:bg-gray-200 transition">
                        <a href="/employee" class="flex items-center space-x-3">
                            <i class="fa-solid fa-users-gear text-xl"></i>
                            <span
                                class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Employee</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role !== 'user')
                    <li class="px-1 py-2 hover:bg-gray-200 transition">
                        <a href="/user" class="flex items-center space-x-3">
                            <i class="fa-solid fa-users text-xl"></i>
                            <span
                                class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Users</span>
                        </a>
                    </li>
                @endif
                <li class="px-1 py-2 hover:bg-gray-200 transition">
                    <a href="/site" class="flex items-center space-x-3">
                        <i class="fa fa-sitemap text-xl" aria-hidden="true"></i>
                        <span
                            class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Site</span>
                    </a>
                </li>
                <li class="px-1 py-2 hover:bg-gray-200 transition">
                    <a href="/sensor_configuration" class="flex items-center space-x-3">
                        <i class="fa fa-desktop text-xl"></i>
                        <span
                            class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Sensor Configuration</span>
                    </a>
                </li>
                <li class="px-2 py-2 hover:bg-red-100 text-red-600 transition">
                    <a href="/logout" class="flex items-center space-x-3">
                        <i class="fa-solid fa-right-from-bracket text-xl"></i>
                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Log-out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>
