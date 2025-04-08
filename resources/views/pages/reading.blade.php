<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Readings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Sidebar Container -->
    <div class="fixed h-screen flex">
        <!-- Sidebar -->
        <x-navbar />
        {{-- <div class="flex h-screen w-screen items-center justify-center">s --}}

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Readings</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left font-semibold">Gauge Factor</th>
                        <th class="px-4 py-2 text-left font-semibold">Voltage</th>
                        <th class="px-4 py-2 text-left font-semibold">Current</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $readings['gauge_factor'] ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $readings['voltage'] ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $readings['current'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{-- @foreach ($data as $item) --}}
                <h2 class="text-xl font-semibold text-center bg-blue-100 p-4 rounded-lg shadow-md">
                    Total: {{ $item['total'] ?? 'N/A' }}
                </h2>
            {{-- @endforeach --}}
        </div>
    </div>
        </div>
</body>
</html>