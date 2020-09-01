<?php

namespace App\Domain\Factory;

use App\Domain\Model\Category;

interface CategoryFactory
{
    public function create(string $name): Category;
}