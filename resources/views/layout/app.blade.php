<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="container max-w-lg mx-auto my-10 font-[Inter]">

    {{-- Flash message --}}
    @if (session()->has('success'))
        <div x-data="{ flash: true }">
            <div
                x-show="flash"
                class="relative mb-10 rounded shadow-sm border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert"
            >
                <strong class="font-bold">Success!</strong>
                <div>{{ session('success') }}</div>
                <button class="absolute top-0 right-0 px-4 py-3 cursor-pointer" @click="flash = false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @yield('content')
</body>
</html>
