<?php

namespace App\Infrastructure\Messenger;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Application\MessageBus as BaseMessageBus;

class MessageBus implements MessageBusInterface, BaseMessageBus
{
    private MessageBusInterface $decorated;

    public function __construct(MessageBusInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function dispatch($message, array $stamps = []): Envelope
    {
        return $this->dispatch($message, $stamps);
    }


}