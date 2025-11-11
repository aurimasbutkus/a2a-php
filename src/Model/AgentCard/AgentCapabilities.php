<?php

namespace NeuronCore\A2A\Model\AgentCard;

class AgentCapabilities
{
    /**
     * @param list<AgentExtension> $extensions
     */
    public function __construct(
        public ?bool  $streaming = null,
        public ?bool  $pushNotifications = null,
        public ?bool  $stateTransitionHistory = null,
        public ?array $extensions = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->streaming !== null) {
            $data['streaming'] = $this->streaming;
        }

        if ($this->pushNotifications !== null) {
            $data['pushNotifications'] = $this->pushNotifications;
        }

        if ($this->stateTransitionHistory !== null) {
            $data['stateTransitionHistory'] = $this->stateTransitionHistory;
        }

        if ($this->extensions !== null) {
            $data['extensions'] = array_map(
                fn(AgentExtension $extension) => $extension->toArray(),
                $this->extensions,
            );
        }

        return $data;
    }
}
