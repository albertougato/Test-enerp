<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-navbar />

    <div class="container mx-auto p-6">
        {{ $slot }}
    </div>
</body>

</html>
