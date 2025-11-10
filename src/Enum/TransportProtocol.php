<?php

namespace NeuronCore\A2A\Enum;

enum TransportProtocol: string
{
    case JSONRPC   = 'JSONRPC';
    case GRPC      = 'GRPC';
    case HTTP_JSON = 'HTTP+JSON';
}
