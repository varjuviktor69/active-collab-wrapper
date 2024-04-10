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
    private int $projectId;
    private int $taskId;
    private string $name;

    public static function fromArray(array $task): self
    {
        $dto = new self();

        $dto->updatedAt = CarbonImmutable::parse($task['updated_on']);
        \Log::info($dto->updatedAt);
        $dto->name = $task['name'];
        $dto->taskId = $task['id'];
        $dto->projectId = $task['project_id'];
        $dto->comments = $task['comments'] ?? null;
        $dto->description = $task['body_formatted'] ?? null;

        return $dto;
    }

    public function toArray(): array{
        return array_filter([
            'name' => $this->name,
            'taskId' => $this->taskId,
            'projectId' => $this->projectId,
            'comments' => $this->comments,
            'updatedAt' => $this->updatedAt,
            'description' => $this->description,
        ], fn($v) => $v !== null);
    }

    public function setComments(array $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}