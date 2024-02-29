<!-- extends default layout -->
@extends('_layouts.auth')

<!-- page title -->
@section('title', 'Recovery Confirmation')

<!-- page content -->
@section('content')
    <h1>Recovery Confirmation</h1>
    <form action="{{ route('auth.recovery.confirmation') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div>
            <button type="submit">Confirm</button>
        </div>
    </form>
@endsection
