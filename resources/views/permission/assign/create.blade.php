@extends('layouts.admin', ['title' => 'Assign'])
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
    <form action="{{route('assign.create')}}" method="post" class="p-3">
        @csrf
        <div class="flex flex-col mt-2">
            <label for="role" class="hidden">Role</label>
            <select name="role" id="role" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option disabled selected>Choose a role</option>
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
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
                <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
            </select>
            @error('permissions')
            <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="mt-3 text-sm bg-teal-500 hover:bg-teal-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            Assign
        </button>
    </form>
</div>

<h1 class="text-3xl py-4 border-b mb-10">Table of Role & Permissions</h1>

<div class="mt-2">
    <!-- component -->
    <div class="my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 ">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-lg shadow-dashboard shadow-lg px-8 pt-3 pb-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Guard Name</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">The Permissions</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Action</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($roles as $index => $role)
                    <tr>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$index + 1}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$role->name}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$role->guard_name}}</td>       
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{implode(', ', $role->getPermissionNames()->toArray())}}</td>    
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><a href="{{route('assign.edit', $role)}}">Edit</a></td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>  
</div>

@endsection

