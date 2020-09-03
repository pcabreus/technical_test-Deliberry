<?php

namespace App\Application;

use App\Domain\Command\CreateCategory;

class CategoryService
{
    private MessageBus $messageBus;

    public function __construct(MessageBus $messageBus)
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