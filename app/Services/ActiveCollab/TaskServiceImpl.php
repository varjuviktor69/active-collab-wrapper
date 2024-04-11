<?php

declare(strict_types=1);

namespace App\Services\ActiveCollab;

use ActiveCollab\SDK\Client;
use App\Dtos\ActiveCollab\TaskDto;
use App\Dtos\ActiveCollab\TaskFilterDto;
use App\Interfaces\ActiveCollab\TaskService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TaskServiceImpl implements TaskService
{
    /**
     * {@inheritDoc}
     */
    public function getAllFiltered(TaskFilterDto $dto): array
    {
        $tasks = json_decode(
            app(Client::class)->get(
                '/users/' . Auth::guard('active-collab')->user()->getLoggedUserId() . '/tasks'
            )->getBody(), true
        )['tasks'];

       return $this->filter($dto, $tasks);
    }

    public function find(TaskFilterDto $dto): TaskDto
    {
        $task = json_decode(
            app(Client::class)->get(
                '/projects/' . $dto->getProjectId() . '/tasks/' . $dto->getTaskId()
            )->getBody(), true
        );

        $dto = TaskDto::fromArray($task['single'])->setComments($task['comments']);

        return $dto;
    }

    /**
     * @return array<TaskDto>
     **/
    private function filter(TaskFilterDto $dto, array $tasks): array
    {
        if ($dto->getOrderDirection() === 'DESC') {
            $tasks = Arr::sortDesc($tasks, function(array $task) use($dto) {
                return $task[$dto->getOrderBy()];
            });
        } elseif($dto->getOrderBy() === 'ASC') {
            $tasks = Arr::sort($tasks, function(array $task) use($dto) {
                return $task[$dto->getOrderBy()];
            });
        }

        $tasks = Arr::map($tasks, function($task) {
           $dto = TaskDto::fromArray($task);
           
           $this->setTaskAssignee($dto);

           return $dto;
        });

        return $tasks;
    }

    private function setTaskAssignee(TaskDto $dto): void
    {
        $assignee = json_decode(
            app(Client::class)->get('/users/' . $dto->getAssigneeId())->getBody(),
            true
        )['single'];

        $dto->setAssignee($assignee);
    }
}