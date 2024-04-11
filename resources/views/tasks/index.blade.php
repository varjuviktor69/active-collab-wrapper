@extends('layouts.app')
@section('body')
<div class="container">
    <div class="header">
        <h1>Your Tasks</h1>
    </div>
    <div class="content"></div>
    <div class="footer">
        @include('logout')
    </div>
</div>
    <script>
        const TASKS_AJAX_URL = "{{ route('tasks.getAll') }}";
    </script>
    <script src="{{ URL::asset('js/tasks.js') . env('STATIC_FILE_VERSION') }}"></script>
    <script src="{{ URL::asset('js/task.js') . env('STATIC_FILE_VERSION') }}"></script>
@endsection