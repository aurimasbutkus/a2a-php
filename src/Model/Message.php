<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model;

use NeuronCore\A2A\Enum\Role;
use NeuronCore\A2A\Model\Part\PartInterface;

class Message
{
    /**
     * @param list<PartInterface>       $parts
     * @param array<string, mixed>|null $metadata
     * @param list<string>|null         $extensions
     * @param list<string>|null         $referenceTaskIds
     */
    public function __construct(
        public Role    $role,
        public string  $messageId,
        public array   $parts,
        public ?array  $metadata = null,
        public ?array  $extensions = null,
        public ?array  $referenceTaskIds = null,
        public ?string $taskId = null,
        public ?string $contextId = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'role'      => $this->role->value,
            'messageId' => $this->messageId,
            'parts'     => array_map(
                fn(PartInterface $part): array => $part->toArray(),
                $this->parts,
            ),
        ];

        if ($this->metadata !== null) {
            $data['metadata'] = $this->metadata;
        }

        if ($this->extensions !== null) {
            $data['extensions'] = $this->extensions;
        }

        if ($this->referenceTaskIds !== null) {
            $data['referenceTaskIds'] = $this->referenceTaskIds;
        }

        if ($this->taskId !== null) {
            $data['taskId'] = $this->taskId;
        }

        if ($this->contextId !== null) {
            $data['contextId'] = $this->contextId;
        }

        return $data;
    }
}
