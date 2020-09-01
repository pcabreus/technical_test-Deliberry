<?php

namespace App\Application;

use App\Domain\Command\CreateCategory;
use Symfony\Component\Messenger\MessageBusInterface;

class CategoryService
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function createCategoriesByName(array $names)
    {
        foreach ($names as $name) {
            $this->messageBus->dispatch(new CreateCategory($name));
        }
    }
}