<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\Part;

use NeuronCore\A2A\Enum\Part;
use NeuronCore\A2A\Model\File\FileInterface;

class FilePart extends BasePart
{
    public function __construct(
        public FileInterface $file,
        ?array               $metadata = null,
    ) {
        parent::__construct(
            Part::FILE,
            $metadata,
        );
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            [
                'file' => $this->file->toArray(),
            ],
        );
    }
}
