<?php

declare(strict_types=1);

namespace NeuronCore\A2A\Server;

use NeuronCore\A2A\Enum\Role;
use NeuronCore\A2A\Model\File\FileWithBytes;
use NeuronCore\A2A\Model\File\FileWithUri;
use NeuronCore\A2A\Model\Message;
use NeuronCore\A2A\Model\Part\DataPart;
use NeuronCore\A2A\Model\Part\FilePart;
use NeuronCore\A2A\Model\Part\PartInterface;
use NeuronCore\A2A\Model\Part\TextPart;
use NeuronCore\A2A\Model\Request\ListTasksParams;
use NeuronCore\A2A\Model\Request\MessageSendParams;

// @TODO: Update the message parsing to properly parse params
class RequestParser
{
    public static function parseMessageSendParams(mixed $params): MessageSendParams
    {
        $params = (array)$params;

        return new MessageSendParams(
            message: self::parseMessage($params['message'] ?? []),
        );
    }

    public static function parseListTasksParams(mixed $params): ListTasksParams
    {
        $params = (array)$params;

        return new ListTasksParams(
            contextId: $params['contextId'] ?? null,
        );
    }

    protected static function parseMessage(array $data): Message
    {
        return new Message(
            role     : Role::from($data['role']),
            messageId: $data['messageId'],
            parts    : self::parseParts($data['parts'] ?? []),
        );
    }

    /**
     * @return array<PartInterface>
     */
    protected static function parseParts(array $partsData): array
    {
        $parts = [];

        foreach ($partsData as $partData) {
            $parts[] = self::parsePart($partData);
        }

        return $parts;
    }

    protected static function parsePart(array $data): PartInterface
    {
        return match ($data['kind']) {
            'text'  => new TextPart(text: $data['text']),
            'file'  => new FilePart(
                file: self::parseFile($data['file']),
            ),
            'data'  => new DataPart(
                data: $data['data'],
            ),
            default => throw new \InvalidArgumentException("Unknown part kind: {$data['kind']}"),
        };
    }

    protected static function parseFile(array $data): FileWithBytes|FileWithUri
    {
        if (isset($data['bytes'])) {
            return new FileWithBytes(
                bytes   : $data['bytes'],
                name    : $data['fileName'],
                mimeType: $data['mimeType'],
            );
        }

        return new FileWithUri(
            uri     : $data['uri'],
            name    : $data['fileName'],
            mimeType: $data['mimeType'],
        );
    }
}
