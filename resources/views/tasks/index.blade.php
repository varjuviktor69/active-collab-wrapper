@extends('layouts.app')
@section('body')
    <H1>Your Tasks</H1>
    <div class="content"></div>
    @include('logout')
    <script>
        const TASKS_AJAX_URL = "{{ route('tasks.getAll') }}";
    </script>
    <script src="{{ URL::asset('js/tasks.js') . env('STATIC_FILE_VERSION') }}"></script>
    <script src="{{ URL::asset('js/task.js') . env('STATIC_FILE_VERSION') }}"></script>
@endsection