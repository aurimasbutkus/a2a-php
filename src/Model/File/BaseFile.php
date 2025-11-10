<?php

namespace NeuronCore\A2A\Model\File;

abstract class BaseFile implements FileInterface
{
    public function __construct(
        public ?string $name = null,
        public ?string $mimeType = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->name !== null) {
            $data['name'] = $this->name;
        }

        if ($this->mimeType !== null) {
            $data['mimeType'] = $this->mimeType;
        }

        return $data;
    }
}
