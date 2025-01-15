<!DOCTYPE html>
<html lang="en" class="bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <title>
        {{ $title ?? 'Admin Dashboard' }}
    </title>

</head>
<body class="bg-gray-100">
    <div>
        <x-admin-navbar></x-admin-navbar>
        <x-admin-sidebar></x-admin-sidebar>

        <main class="p-4 md:ml-64 h-auto pt-20">
            @isset($slot)
                {{ $slot }}
            @else
                <x-main></x-main>
            @endisset
        </main>
    </div>
</body>
</html>
