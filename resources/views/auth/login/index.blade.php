<!-- extends default layout -->
@extends('_layouts.auth')

<!-- page title -->
@section('title', 'Login')

<!-- page content -->
@section('content')
    <h1>Login</h1>
    <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
