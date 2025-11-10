<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\AgentCard;

use NeuronCore\A2A\Enum\TransportProtocol;

class AgentInterface
{
    public function __construct(
        public string            $url,
        public TransportProtocol $transport,
    ) {
    }

    /**
     * @return array{url: string, transport: string}
     */
    public function toArray(): array
    {
        return [
            'url'       => $this->url,
            'transport' => $this->transport->value,
        ];
    }
}
