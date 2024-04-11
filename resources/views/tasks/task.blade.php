<div class="task-container box">
    <h3>Name: {{ $name }}</h3>
    <p>Created on: {{ $createdAt }}</p>
    <p>Last modified: {{ $updatedAt }}</p>
    <p>Assignee: {{ $assignee['display_name'] ?? ''}}</p>
    <a class="view-task" href="{{ route('tasks.view', ['id' => $taskId, 'projectId' => $projectId]) }}">View task</a>
</div>