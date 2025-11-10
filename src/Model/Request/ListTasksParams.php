<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\Request;

use NeuronCore\A2A\Model\TaskStatus;

class ListTasksParams
{
    /**
     * @param array<string, mixed>|null $metadata
     */
    public function __construct(
        public ?string     $contextId = null,
        public ?TaskStatus $status = null,
        public ?int        $pageSize = null,
        public ?string     $pageToken = null,
        public ?int        $historyLength = null,
        public ?int        $lastUpdatedAfter = null,
        public ?bool       $includeArtifacts = null,
        public ?array      $metadata = null,
    ) {
    }
}
