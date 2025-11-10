<?php

namespace NeuronCore\A2A\Model\Request;

use NeuronCore\A2A\Model\PushNotificationConfig;

class MessageSendConfiguration
{
    /**
     * @param list<string>|null $acceptedOutputModes
     */
    public function __construct(
        public ?array                  $acceptedOutputModes = null,
        public ?int                    $historyLength = null,
        public ?PushNotificationConfig $pushNotificationConfig = null,
        public ?bool                   $blocking = null,
    ) {
    }
}
