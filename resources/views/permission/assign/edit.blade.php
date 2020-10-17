@extends('layouts.admin', ['title' => 'Edit Assign'])
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
<h1 class="text-3xl py-4 border-b mb-10">Assign</h1>
<div class="w-full md:w-1/2 lg:w-1/3 text-md bg-white rounded-lg shadow-md rounded">
    <form action="{{route('assign.edit', $role)}}" method="post" class="p-3">
        @csrf
        @method('PUT')
        <div class="flex flex-col mt-2">
            <label for="role" class="hidden">Edit Assign</label>
            <select name="role" id="role" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option disabled selected>Choose a role</option>
                @foreach ($roles as $item)
                <option {{$role->id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('role')
            <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col mt-2">
            <label for="permissions" class="hidden">Permissions</label>
            <select multiple name="permissions[]" id="permissions" class="js-example-basic-multiple block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($permissions as $permission)
                <option {{$role->permissions()->find($permission->id) ? "selected" : ""}} value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
            </select>
            @error('permissions')
            <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="mt-3 text-sm bg-teal-500 hover:bg-teal-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            Update
        </button>
    </form>
</div>


@endsection

