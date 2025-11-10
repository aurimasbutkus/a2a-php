<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model;

use NeuronCore\A2A\Model\Part\PartInterface;

class Artifact
{
    /**
     * @param list<PartInterface>       $parts
     * @param array<string, mixed>|null $metadata
     * @param list<string>|null         $extensions
     */
    public function __construct(
        public string  $artifactId,
        public array   $parts,
        public ?string $name = null,
        public ?string $description = null,
        public ?array  $metadata = null,
        public ?array  $extensions = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'artifactId' => $this->artifactId,
            'parts'      => array_map(
                fn(PartInterface $part): array => $part->toArray(),
                $this->parts,
            ),
        ];

        if ($this->name !== null) {
            $data['name'] = $this->name;
        }

        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        if ($this->metadata !== null) {
            $data['metadata'] = $this->metadata;
        }

        if ($this->extensions !== null) {
            $data['extensions'] = $this->extensions;
        }

        return $data;
    }
}
