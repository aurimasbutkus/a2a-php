<?php

namespace NeuronCore\A2A\Model\Part;

use NeuronCore\A2A\Enum\Part;

abstract class BasePart implements PartInterface
{
    /**
     * @param array<string, mixed>|null $metadata
     */
    public function __construct(
        public Part   $kind,
        public ?array $metadata = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'kind' => $this->kind->value,
        ];

        if ($this->metadata !== null) {
            $data['metadata'] = $this->metadata;
        }

        return $data;
    }
}
