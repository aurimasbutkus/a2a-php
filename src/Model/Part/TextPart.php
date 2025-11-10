<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\Part;

use NeuronCore\A2A\Enum\Part;

class TextPart extends BasePart
{
    public function __construct(
        public string $text,
        ?array        $metadata = null,
    ) {
        parent::__construct(
            Part::TEXT,
            $metadata,
        );
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            [
                'text' => $this->text,
            ],
        );
    }
}
