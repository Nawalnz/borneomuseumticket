@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-bold">Dashboard</h1>
@endsection

@section('content')
    <p>Welcome, {{ Auth::user()->name }}!</p>
@endsection
