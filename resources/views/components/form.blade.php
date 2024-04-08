
@props([
    'class',
    'method' => 'POST',
    'action', 
])

<div class="{{ $class }}">
    <form action="{{ $action }}" method="{{ $method }}">
        @csrf
        @yield('form-body')
    </form>
</div>