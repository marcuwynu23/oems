<!-- extends default layout -->
@extends('_layouts.auth')

<!-- page title -->
@section('title', 'Recovery')

<!-- page content -->
@section('content')
    <h1>Recovery</h1>
    <form action="{{ route('auth.recovery') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <button type="submit">Recover</button>
        </div>
    </form>
@endsection
