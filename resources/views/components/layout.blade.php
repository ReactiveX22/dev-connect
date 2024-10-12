<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>devHunt 🎯</title>
</head>

<body class="max-h-screen bg-zinc-950 pb-10 font-inter text-zinc-50">
    <div class="mx-auto max-w-[986px] px-10 pb-4">
        <x-navbar.navbar />

        <main class="mx-auto mt-10 max-w-[986px] flex-grow">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
