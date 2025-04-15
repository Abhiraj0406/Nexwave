<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Site</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-indigo-200 font-sans">
    <div class="fixed h-screen flex">
        <x-navbar />
        <div class="flex h-screen w-screen items-center justify-center">
            <div class="flex flex-col items-center w-full max-w-4xl">
                <div class="flex flex-wrap justify-center space-x-6 mb-8">
                    <section class="flex-1 px-14 py-3 min-w-[300px] max-w-[400px]">
                        <div class="border-4 border-purple-600 rounded-2xl p-6 shadow-2xl bg-white">
                            <div class="text-center mb-6">
                                <p class="text-3xl font-semibold text-purple-800 tracking-wide">
                                    Gauge Factor
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="gauge_factor" class="block text-lg font-medium text-gray-700 mb-2">Gauge Factor:</label>
                                <input type="text" name="gauge_factor" id="gauge_factor"
                                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-lg">
                            </div>
                        </div>
                    </section>

                    <section class="flex-1 px-14 py-3 min-w-[300px] max-w-[400px]">
                        <div class="border-4 border-purple-600 rounded-2xl p-6 shadow-2xl bg-white">
                            <div class="text-center mb-6">
                                <p class="text-3xl font-semibold text-purple-800 tracking-wide">
                                    Input Readings
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="voltage" class="block text-lg font-medium text-gray-700 mb-2">Voltage:</label>
                                <input type="text" name="voltage"
                                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-lg">
                            </div>
                            <div>
                                <label for="current" class="block text-lg font-medium text-gray-700 mb-2">Current:</label>
                                <input type="text" name="current"
                                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-lg">
                            </div>
                        </div>
                    </section>
                </div>

                <section>
                    <div class="flex flex-wrap justify-center space-x-4">
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Read
                        </a>
                        <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </a>
                        <a href="/readings" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Monitor
                        </a>
                    </div>
                </section>
            </div>
        </div>
        <script src="/js/tailwind.config.js"></script>
    </div>
</body>

</html>