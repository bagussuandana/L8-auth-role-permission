@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    Hi {{ Auth::user()->name }}, its your dashboard.
@endsection