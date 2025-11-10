<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\Request;

use NeuronCore\A2A\Model\Message;

class MessageSendParams
{
    /**
     * @param array<string, mixed>|null $metadata
     */
    public function __construct(
        public Message                   $message,
        public ?MessageSendConfiguration $configuration = null,
        public ?array                    $metadata = null,
    ) {
    }
}
