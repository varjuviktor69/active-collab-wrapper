<?php

declare(strict_types=1);

namespace App\Dtos\ActiveCollab;

use App\Dtos\FilterDto;
use Illuminate\Http\Request;

class TaskFilterDto extends FilterDto
{
    private string $orderBy = 'updated_on';
    private int $projectId;
    private ?int $taskId;

    public static function fromRequest(Request $request): self
    {
        $dto = new self($request);

        $dto->orderBy ??= $request->orderBy;
        $dto->projectId = (int) ($request->projectId ?? config('active-collab.default-project-id'));
        $dto->taskId = $request->taskId ?? null;

        return $dto;
    }

    public function getOrderBy(): string
    {
        return $this->orderBy;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }
}