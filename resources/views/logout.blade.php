@extends('components.form', [
    'class' => 'logout-container',
    'action' => route('logout'),
])
@section('form-body')
    <button>Sign out</button>
@endsection