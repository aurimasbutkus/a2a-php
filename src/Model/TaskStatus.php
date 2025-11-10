<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model;

use NeuronCore\A2A\Enum\TaskState;

class TaskStatus
{
    public function __construct(
        public TaskState $state,
        public ?Message  $message = null,
        public ?string   $timestamp = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'state' => $this->state->value,
        ];

        if ($this->message !== null) {
            $data['message'] = $this->message->toArray();
        }

        if ($this->timestamp !== null) {
            $data['timestamp'] = $this->timestamp;
        }

        return $data;
    }
}
