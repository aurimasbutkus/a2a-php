<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\Response;

use NeuronCore\A2A\Model\Task;

class ListTasksResult
{
    /**
     * @param list<Task> $tasks
     */
    public function __construct(
        public array  $tasks,
        public int    $totalSize,
        public int    $pageSize,
        public string $nextPageToken,
    ) {
    }

    public function toArray(): array
    {
        return [
            'tasks'         => array_map(
                fn(Task $task): array => $task->toArray(),
                $this->tasks
            ),
            'totalSize'     => $this->totalSize,
            'pageSize'      => $this->pageSize,
            'nextPageToken' => $this->nextPageToken,
        ];
    }
}
