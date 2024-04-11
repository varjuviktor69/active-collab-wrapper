@extends('components.form', [
    'class' => 'logout-container',
    'action' => route('logout'),
])
@section('form-body')
    <button class="logout">Sign out</button>
@endsection