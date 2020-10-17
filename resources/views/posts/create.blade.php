@extends('layouts.admin', ['title' => 'Posts Create'])
@section('content')
    Hi {{ Auth::user()->name }}, its your Posts Create.
@endsection