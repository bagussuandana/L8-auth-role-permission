@extends('layouts.admin', ['title' => 'Navigation Table'])
@section('content')

<h1 class="text-3xl py-4 border-b mb-10">Navigation Table</h1>
<div class="mt-2">
    <!-- component -->
    <div class="my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 ">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-lg shadow-dashboard shadow-lg px-8 pt-3 pb-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Parent</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">URL</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Permission Name</th>
                        <th class="px-4 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($navigations as $navigation)
                    <tr>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$navigation->parent->name}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$navigation->name}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$navigation->url ?? "It's a Parent"}}</td>                    
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$navigation->permission_name}}</td>
                        <td class="px-4 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><a href="{{route('navigation.edit', $navigation)}}">Edit/Remove</a></td>
                   
                    </tr>
                    @endforeach

                </tbody>
            </table>
    </div>  
</div>
@endsection