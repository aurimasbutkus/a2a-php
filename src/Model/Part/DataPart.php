<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\Part;

use NeuronCore\A2A\Enum\Part;

class DataPart extends BasePart
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(
        public array $data,
        ?array       $metadata = null,
    ) {
        parent::__construct(
            Part::DATA,
            $metadata,
        );
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            [
                'data' => $this->data,
            ],
        );
    }
}
