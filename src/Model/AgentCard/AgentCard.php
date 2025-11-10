<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Model\AgentCard;

use NeuronCore\A2A\Enum\TransportProtocol;

class AgentCard
{
    /**
     * @param array<AgentSkill>                $skills
     * @param array<AgentInterface>            $additionalInterfaces
     * @param array<string, mixed>|null        $securitySchemes
     * @param array<array<string, mixed>>|null $security
     * @param array<AgentCardSignature>        $signatures
     * @param list<string>                     $defaultInputModes
     * @param list<string>                     $defaultOutputModes
     */
    public function __construct(
        public string             $protocolVersion,
        public string             $name,
        public string             $description,
        public string             $url,
        public string             $version,
        public AgentCapabilities  $capabilities,
        public array              $skills = [],
        public array              $defaultInputModes = [],
        public array              $defaultOutputModes = [],
        public ?TransportProtocol $preferredTransport = null,
        public ?array             $additionalInterfaces = null,
        public ?string            $iconUrl = null,
        public ?AgentProvider     $provider = null,
        public ?string            $documentationUrl = null,
        public ?array             $securitySchemes = null,
        public ?array             $security = null,
        public ?bool              $supportsAuthenticatedExtendedCard = null,
        public ?array             $signatures = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'protocolVersion'    => $this->protocolVersion,
            'name'               => $this->name,
            'description'        => $this->description,
            'url'                => $this->url,
            'version'            => $this->version,
            'capabilities'       => $this->capabilities->toArray(),
            'skills'             => array_map(
                fn(AgentSkill $skill): array => $skill->toArray(),
                $this->skills,
            ),
            'defaultInputModes'  => $this->defaultInputModes,
            'defaultOutputModes' => $this->defaultOutputModes,
        ];

        if ($this->preferredTransport !== null) {
            $data['preferredTransport'] = $this->preferredTransport->value;
        }

        if ($this->additionalInterfaces !== null) {
            $data['additionalInterfaces'] = array_map(
                fn(AgentInterface $interface): array => $interface->toArray(),
                $this->additionalInterfaces,
            );
        }

        if ($this->iconUrl !== null) {
            $data['iconUrl'] = $this->iconUrl;
        }

        if ($this->provider !== null) {
            $data['provider'] = $this->provider->toArray();
        }

        if ($this->documentationUrl !== null) {
            $data['documentationUrl'] = $this->documentationUrl;
        }

        if ($this->securitySchemes !== null) {
            $data['securitySchemes'] = $this->securitySchemes;
        }

        if ($this->security !== null) {
            $data['security'] = $this->security;
        }

        if ($this->supportsAuthenticatedExtendedCard !== null) {
            $data['supportsAuthenticatedExtendedCard'] = $this->supportsAuthenticatedExtendedCard;
        }

        if ($this->signatures !== null) {
            $data['signatures'] = array_map(
                fn(AgentCardSignature $signature): array => $signature->toArray(),
                $this->signatures,
            );
        }

        return $data;
    }
}
