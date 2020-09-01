<?php

namespace App\Infrastructure\Api\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Application\TimestampableService;
use App\Domain\Model\Timestampable;

class DataPersister implements DataPersisterInterface
{
    private TimestampableService $timestampableService;
    private ContextAwareDataPersisterInterface $decorated;

    public function __construct(
        ContextAwareDataPersisterInterface $decorated,
        TimestampableService $timestampableService
    ) {
        $this->timestampableService = $timestampableService;
        $this->decorated = $decorated;
    }

    public function supports($data): bool
    {
        return $this->decorated->supports($data);
    }

    public function persist($data)
    {
        if($data instanceof Timestampable) {
            $product = $this->timestampableService->update($data);
        }

        return $this->decorated->persist($product);
    }

    public function remove($data)
    {
        return $this->decorated->remove($data);
    }

}