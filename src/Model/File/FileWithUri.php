<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\File;

class FileWithUri extends BaseFile
{
    public function __construct(
        public string $uri,
        ?string       $name = null,
        ?string       $mimeType = null,
    ) {
        parent::__construct(
            name    : $name,
            mimeType: $mimeType,
        );
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            [
                'uri' => $this->uri,
            ],
        );
    }
}
