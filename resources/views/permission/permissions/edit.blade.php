@extends('layouts.admin', ['title' => 'Permission Edit'])
@section('content')
<div class="w-full md:w-1/2 lg:w-1/3 text-md bg-white rounded-lg shadow-md rounded">
    <form action="{{route('permissions.edit', $permission)}}" method="post" class="p-3">
        @csrf
        @method('PUT')
        @include('permission.permissions.partials.form-control')
    </form>
</div>
@endsection