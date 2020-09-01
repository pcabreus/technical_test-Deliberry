<?php

namespace App\Application;

use App\Domain\Model\Timestampable;

class TimestampableService
{
    public function update(Timestampable $timestampable): Timestampable
    {
        if (!$timestampable->getCreatedAt()) {
            $timestampable->setCreatedAt(new \DateTime());
        }

        $timestampable->setUpdatedAt(new \DateTime());

        return $timestampable;
    }
}