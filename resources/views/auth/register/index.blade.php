<!-- extends default layout -->
@extends('_layouts.auth')

<!-- page title -->
@section('title', 'Register')

<!-- page content -->
@section('content')
    <h1>Register</h1>
    <form action="{{ route('auth.register') }}" method="post">
        @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
@endsection
