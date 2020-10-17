@extends('layouts.admin', ['title' => 'Categories Table'])
@section('content')
    Hi {{ Auth::user()->name }}, its your Categories Table
@endsection