<div class="bg-white flex justify-between px-2 py-2">
    <ul class="flex items-center">
        <li>
            <a href="/" class="p-3">Home</a>
        </li>
        <li>
            <a href="/dashboard" class="p-3 inline-block">Dashboard</a>
        </li>
    </ul>
    <ul class="flex items-center">
        @guest
        <li>
            <a href="/login" class="p-3 inline-block">Login</a>
        </li>
        <li>
            <a href="/register" class="p-3 inline-block">Register</a>
        </li>
        @else
        <li>
            <a href="/profile" class="p-3 inline-block">{{Auth::user()->name}}</a>
        </li>
        <li>
            <a href="/logout" class="p-3 inline-block">Logout</a>
        </li>
        @endguest
    </ul>
</div>