<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column" style="min-height: 100vh;">

    {{-- Header --}}
    @include('layouts.header')

    <div class="d-flex flex-grow-1">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Konten Utama --}}
        <main class="flex-grow-1 p-4">
            <div class="container">
                {{-- Section content akan diganti oleh view child --}}
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
