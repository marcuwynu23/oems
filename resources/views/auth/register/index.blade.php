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
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName">
        </div>
        <!-- middle name -->
        <div>
            <label for="middleName">Middle Name</label>
            <input type="text" name="middleName" id="middleName">
        </div>
        <div>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
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
