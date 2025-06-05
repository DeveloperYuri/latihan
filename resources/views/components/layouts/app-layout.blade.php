{{-- resources/views/layouts/app-layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Laravel CRUD' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <nav class="mb-6 bg-white p-4 rounded shadow">
        <a href="{{ route('productcomponent.index') }}" class="font-bold text-lg text-blue-600">Products</a>
    </nav>

    <main class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
