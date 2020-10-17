<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bg-gray-200">
    <x-layouts.navigation> 
    </x-layouts.navigation>
    <div class="container mx-auto pt-20">
        @yield('content')
    </div>
</body>
</html>