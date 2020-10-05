@extends('layouts.app', ['title' => 'Login'])
@section('content')
<div class="bg-white shadow p-8 rounded-lg w-full lg:w-5/12">
    <div class="font-medium text-lg">
        Login
    </div>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="email" class="text-sm mb-2 block font-medium">Email</label>
            <input type="email" name="email" id="email" class="px-4 py-2 rounded w-full border focus:outline-none focus:bg-blue-100">
            @error('email')
            <span role="alert" class="mt-2 text-red-500 block">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="text-sm mb-2 block font-medium">Password</label>
            <input type="password" name="password" id="password" class="px-4 py-2 rounded w-full border focus:outline-none focus:bg-blue-100">
            @error('password')
            <span role="alert" class="mt-2 text-red-500 block">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5 flex items-center">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" class="ml-2 select-none">Remember Me</label>
        </div>

        <button class="px-4 py-2 rounded bg-blue-500 hover:bg-blue-600 text-white transition-colors duration-150">
            Login
        </button>
    </form>
</div>
@endsection