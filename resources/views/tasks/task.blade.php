<div class="task-container">
    <h3>Name: {{ $name }}</h3>
    <p>Updated on: {{ $updatedAt }}</p>
    <a class="view-task" href="{{ route('tasks.view', ['id' => $taskId, 'projectId' => $projectId]) }}">View task</a>
</div>