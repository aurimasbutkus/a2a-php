<?php

namespace NeuronCore\A2A\Model;

class PushNotificationConfig
{
    public function __construct(
        public string                              $url,
        public ?string                             $id = null,
        public ?string                             $token = null,
        public ?PushNotificationAuthenticationInfo $authentication = null,
    ) {
    }
}
