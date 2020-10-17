@extends('layouts.admin', ['title' => 'Posts Table'])
@section('content')
    Hi {{ Auth::user()->name }}, its your Posts Table.
@endsection