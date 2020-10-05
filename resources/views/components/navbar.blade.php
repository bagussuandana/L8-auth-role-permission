<div class="bg-white flex justify-between px-2 py-2">
    <ul class="flex items-center">
        <li>
            <a href="{{route('home')}}" class="p-3">Home</a>
        </li>
        <li>
            <a href="{{route('dashboard')}}" class="p-3 inline-block">Dashboard</a>
        </li>
    </ul>
    <ul class="flex items-center">
        @guest
        <li>
            <a href="{{route('login')}}" class="p-3 inline-block">Login</a>
        </li>
        <li>
            <a href="{{route('register')}}" class="p-3 inline-block">Register</a>
        </li>
        @else
        <li>
            <a href="/profile" class="p-3 inline-block">{{Auth::user()->name}}</a>
        </li>
        <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="px-3 inline-block focus:outline-none">Logout</button>
            </form>
        </li>
        @endguest
    </ul>
</div>