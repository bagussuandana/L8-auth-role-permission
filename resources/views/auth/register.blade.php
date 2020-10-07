@extends('layouts.guest', ['title' => 'Register'])
@section('content')
<div class="flex h-screen">
    <div class="card max-w-md md:rounded-lg m-auto">
        <form class="bg-white shadow-xl mb-4 flex flex-wrap justify-center py-10" action="{{route('register')}}" method="POST">
            @csrf
            <div class="w-full bg-teal-500 p-5 text-white">
                <p class="mb-8 text-3xl flex items-center">
                <svg width="32" height="32" viewBox="0 0 512 512" class="inline-block fill-current h-8 w-8 mr-2">
                    <path d="m64 496l0-256 48 0 0-80c0-71 57-128 128-128l16 0c71 0 128 57 128 128l0 80 48 0 0 256z m172-131l-12 83 48 0-12-83c12-5 20-17 20-30 0-18-14-32-32-32-18 0-32 14-32 32 0 13 8 25 20 30z m100-197c0-49-39-88-88-88-49 0-88 39-88 88l0 72 176 0z"/>
                </svg>
                Login Now
                </p>

                <div class="mb-4">
                    <input class="appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="name" name="name" id="name" placeholder="Name"/>
                </div>
                @error('name')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 mb-2" role="alert">
                    <p>{{$message}}</p>
                </div>
                @enderror

                <div class="mb-4">
                    <input class="appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" id="email" placeholder="Email"/>
                </div>
                @error('email')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 mb-2" role="alert">
                    <p>{{$message}}</p>
                </div>
                @enderror

                <div class="mb-4">
                    <input class="appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" id="password" placeholder="Password"/>
                </div>
                @error('password')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 mb-2" role="alert">
                    <p>{{$message}}</p>
                </div>
                @enderror

                <div class="mb-4">
                    <input class="appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password_confirmation" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation"/>
                </div>
                @error('password_confirmation')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 mb-2" role="alert">
                    <p>{{$message}}</p>
                </div>
                @enderror

                <button class="block w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit">Register</button>


            </div>
            <div class="w-full p-6 flex flex-col justify-between">
                <p class="text-gray-700 mb-8">Login to access your files, communicate with colleagues and view project content.</p>
                <a class="block w-full mb-8 text-sm text-center text-blue-600 hover:text-blue-700" href="{{route('login')}}">Have an account? Login Now!</a>
                <p class="mb-4 text-center">OR</p>
                <hr class="block w-full mb-4 border-0 border-t border-gray-300" />
                <x-oauth/>
            </div>
        </form>
    </div>
</div>
@endsection