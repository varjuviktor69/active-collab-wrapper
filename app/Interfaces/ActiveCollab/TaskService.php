<?php

declare(strict_types=1);

namespace App\Interfaces\ActiveCollab;

use App\Dtos\ActiveCollab\TaskDto;
use App\Dtos\ActiveCollab\TaskFilterDto;

interface TaskService
{
    /**
     * @return array<TaskDto>
     **/
    public function getAllFiltered(TaskFilterDto $dto): array;

    public function find(TaskFilterDto $dto): TaskDto;
}