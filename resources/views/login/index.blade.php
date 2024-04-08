@extends('layouts.app')
@section('body')
    @extends('components.form', [
        'class' => 'login-container',
        'action' => route('login.create')
    ])
    @section('form-body')
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button>Login</button>
    @endsection
@endsection