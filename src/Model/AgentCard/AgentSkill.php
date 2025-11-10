<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\AgentCard;

class AgentSkill
{
    /**
     * @param list<string>|null                $examples
     * @param list<string>|null                $inputModes
     * @param list<string>|null                $outputModes
     * @param array<string, list<string>>|null $security
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public array  $tags = [],
        public ?array $examples = null,
        public ?array $inputModes = null,
        public ?array $outputModes = null,
        public ?array $security = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'tags'        => $this->tags,
        ];

        if ($this->examples !== null) {
            $data['examples'] = $this->examples;
        }

        if ($this->inputModes !== null) {
            $data['inputModes'] = $this->inputModes;
        }

        if ($this->outputModes !== null) {
            $data['outputModes'] = $this->outputModes;
        }

        if ($this->security !== null) {
            $data['security'] = $this->security;
        }

        return $data;
    }
}
