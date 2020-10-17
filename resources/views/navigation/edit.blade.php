@extends('layouts.admin', ['title' => 'Navigation'])
@section('content')
@if (session('success'))
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
    <div slot="avatar">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
    </div>
    <div class="text-xl font-normal  max-w-full flex-initial">
        {{session('success')}}
    </div>
</div>
    
@endif
<h1 class="text-3xl py-4 border-b mb-10">Navigation Setup</h1>
<div class="w-full md:w-1/2 lg:w-1/3 text-md bg-white rounded-lg shadow-md rounded">
    <form action="{{route('navigation.edit', $navigation)}}" method="post" class="p-3">
        @method('PUT')
        @include('navigation.partials.form-control')
    </form>
    @include('navigation.delete')
</div>
@endsection