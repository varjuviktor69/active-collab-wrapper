<div class="tasks-container">
    @foreach($tasks as $task)
        @include('tasks.task', $task->toArray())
    @endforeach
</div>
