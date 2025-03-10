<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <title>AmA e-Book</title>

</head>
    <body class="bg-contain bg-repeat bg-[url(/images/collage.png)]">
        @include('layouts.navigation2')

        @isset($header)
        <header>
            <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white">
                {{ $header }}
            </div>
        </header>
        @endisset


        <main class="container mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </body>
</html>