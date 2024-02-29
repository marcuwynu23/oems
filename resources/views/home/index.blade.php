@extends('_layouts.default')


@section('title', 'Home')

@section('content')
    <h1>Home</h1>
    <p>Welcome to the home page.</p>

    <p>
        <a href="{{ route('auth.logout') }}">Logout</a>
    </p>
@endsection
