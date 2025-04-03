<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">
    <div class=" h-screen flex">
        <div class="flex w-1/5">
            <x-navbar />
        </div>

        <div class="flex w-4/5">
            <div class="w-2/5 m-5 bg-gray-400 rounded-xl shadow-lg p-5">
                <!-----Profile Picture------>
                <div class="flex flex-col items-center">
                    {{-- <img src="{{ $image ?? '/default-profile.png' }}" alt="" --}}
                        class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 rounded-full border-4 border-white shadow-md object-cover">
                    <h2 class="mt-3 text-xl font-semibold text-white"></h2>
                </div>
                <div id="dataList">
                    <h1 class="text-lg font-bold text-white mt-5">User Profile</h1>
                    <p><strong id="name">Name: {{Auth()->user()->name}}</strong> </p>
                    <p><strong id="email">Email:</strong> </p>
                    <p><strong id="number">Number:</strong> </p>
                    <p><strong id="gender">Gender:</strong> </p>
                    <p><strong id="age">Age:</strong> </p>
                    <p><strong id="address">Address:</strong> </p>

                    {{-- <p><strong>Name:</strong> {{ $name }}</p>
                    <p><strong>Email:</strong> {{ $email }}</p>
                    <p><strong>Number:</strong> {{ $number }}</p>
                    <p><strong>Gender:</strong> {{ $gender }}</p>
                    <p><strong>Age:</strong> {{ $age }}</p>
                    <p><strong>Address:</strong> {{ $address }}</p> --}}
                </div>
            </div>

            <div class="w-3/5 m-5 bg-orange-400 rounded-xl shadow-lg p-5">
                {{-- <h1 class="text-2xl font-bold text-white">Profile Page</h1>
                <p class="mt-2 text-white"><strong>Name:</strong> {{ $name }}</p>
                <p class="mt-2 text-white"><strong>Email:</strong> {{ $email }}</p>
                <p class="mt-2 text-white"><strong>Role:</strong> {{ $role ?? 'User' }}</p> --}}

                <div class="mt-5">
                    <a href="{{ route('logout') }}"
                        class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/profile.js"></script>
</body>
</html>
