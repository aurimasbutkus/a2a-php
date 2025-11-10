<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\AgentCard;

class AgentExtension
{
    /**
     * @param array<string, mixed>|null $params
     */
    public function __construct(
        public string  $uri,
        public ?string $description = null,
        public ?bool   $required = null,
        public ?array  $params = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'uri' => $this->uri,
        ];

        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        if ($this->required !== null) {
            $data['required'] = $this->required;
        }

        if ($this->params !== null) {
            $data['params'] = $this->params;
        }

        return $data;
    }
}
