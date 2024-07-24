@extends('layouts.user')

@section('content')
<div class="container">
    <h1>User Login</h1>
    <form method="POST" action="{{ route('user.login.submit') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="mt-3">
        <p>Don't have an account? <a href="{{ route('user.register') }}">Register here</a></p>
    </div>
</div>
@endsection
