<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Site</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Sidebar Container -->
    <div class="fixed h-screen flex">
        <!-- Sidebar -->
        <x-navbar />
        {{-- @auth
        @endauth --}}
        <div class="flex h-screen w-screen items-center justify-center">
            <section class="bg-gray-50 dark:bg-gray-900 flex items-center justify-center min-h-screen min-w-full">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto  lg:py-0">
                    <a href="https://www.encardio.com/"
                        class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="w-23 h-20 mr-2 rounded-full"
                            src="https://about.me/cdn-cgi/image/q=80,dpr=1,f=auto,fit=cover,w=1200,h=630,gravity=auto/https://assets.about.me/background/users/e/n/c/encardio_1669700076_845.jpg"
                            alt="logo">
                        Encardio Rite
                    </a>
                    <div
                        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                Create New Site
                            </h1>

                            @if ($errors->any())
                                <p style="color: red;">{{ $errors->first() }}</p>
                            @endif

                            <form class="space-y-4 md:space-y-6" action="{{ route('createSite') }}" method="post">
                                @csrf
                                <div>
                                    <label for="site_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site
                                        Name</label>
                                    <input type="text" name="site_name" id="site_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="enter name of site" required>

                                    <label for="user_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign to
                                        User</label>

                                    <select name="user_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                        @if ($users->isEmpty())
                                            <option value="" disabled>No users available</option>
                                        @else
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                    ({{ $user->email }})</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                                    Site
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <script src="/js/tailwind.config.js"></script>
    </div>
</body>

</html>
