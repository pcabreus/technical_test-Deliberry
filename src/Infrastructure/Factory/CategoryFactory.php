<?php

namespace App\Infrastructure\Factory;

use App\Domain\Factory\CategoryFactory as BaseCategoryFactory;
use App\Domain\Model\Category as BaseCategory;
use App\Infrastructure\Entity\Category;

class CategoryFactory implements BaseCategoryFactory
{
    public function create(string $name): BaseCategory
    {
        return new Category($name);
    }
}