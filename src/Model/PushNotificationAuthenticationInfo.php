<?php

namespace NeuronCore\A2A\Model;

class PushNotificationAuthenticationInfo
{
    /**
     * @param list<string>|null $schemes
     */
    public function __construct(
        public ?array  $schemes = null,
        public ?string $credentials = null,
    ) {
    }
}
