<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bg-gray-200">
    <x-navbar> 
    </x-navbar>
    <div class="container mx-auto mt-5">
        @yield('content')
    </div>
</body>
</html>