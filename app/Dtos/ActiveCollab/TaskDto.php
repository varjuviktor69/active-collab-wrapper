<?php

declare(strict_types=1);

namespace App\Dtos\ActiveCollab;

use Carbon\CarbonImmutable;
use Illuminate\Contracts\Support\Arrayable;

class TaskDto implements Arrayable
{
    private ?array $comments;
    private ?string $description;
    private CarbonImmutable $updatedAt;
    private CarbonImmutable $createdAt;
    private int $projectId;
    private int $taskId;
    private string $name;
    private ?int $assigneeId;
    private ?array $assignee = null;

    public static function fromArray(array $task): self
    {
        $dto = new self();

        $dto->updatedAt = CarbonImmutable::parse($task['updated_on']);
        $dto->createdAt = CarbonImmutable::parse($task['created_on']);
        $dto->name = $task['name'];
        $dto->taskId = $task['id'];
        $dto->projectId = $task['project_id'];
        $dto->comments = $task['comments'] ?? null;
        $dto->description = $task['body_formatted'] ?? null;
        $dto->assigneeId = $task['assignee_id'] ?? null;

        return $dto;
    }

    public function toArray(): array{
        return array_filter([
            'name' => $this->name,
            'taskId' => $this->taskId,
            'projectId' => $this->projectId,
            'comments' => $this->comments,
            'updatedAt' => $this->updatedAt,
            'createdAt' => $this->createdAt,
            'description' => $this->description,
            'assignee' => $this->assignee,
        ], fn($v) => $v !== null);
    }

    public function getAssigneeId(): ?int
    {
        return $this->assigneeId;
    }

    public function setComments(array $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function setAssignee(array $assignee): self
    {
        $this->assignee = $assignee;

        return $this;
    }
}