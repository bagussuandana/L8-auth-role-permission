@extends('layouts.admin', ['title' => 'Permissions'])
@section('content')
<h1 class="text-3xl py-4 border-b mb-10">Permissions</h1>
<div class="w-full md:w-1/2 lg:w-1/3 text-md bg-white rounded-lg shadow-md rounded">
    <form action="{{route('permissions.create')}}" method="post" class="p-3">
        @csrf
        @include('permission.permissions.partials.form-control', ['submit' => 'Create'])
    </form>
</div>
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
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Created At</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Action</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($permissions as $index => $permission)
                    <tr>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$index + 1}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$permission->name}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$permission->guard_name}}</td>                    
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$permission->created_at->format('d F Y')}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><a href="{{route('permissions.edit', $permission)}}">Edit</a></td>  
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">Delete</td>                    
                    </tr>
                    @endforeach

                </tbody>
            </table>
    </div>  
</div>


@endsection