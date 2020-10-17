@extends('layouts.admin', ['title' => 'Role Edit'])
@section('content')
<div class="w-full md:w-1/2 lg:w-1/3 text-md bg-white rounded-lg shadow-md rounded">
    <form action="{{route('roles.edit', $role)}}" method="post" class="p-3">
        @csrf
        @method('PUT')
        @include('permission.roles.partials.form-control')
    </form>
</div>
@endsection