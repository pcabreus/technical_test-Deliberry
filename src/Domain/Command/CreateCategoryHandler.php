<?php

namespace App\Domain\Command;

use App\Domain\Factory\CategoryFactory;
use App\Domain\Persister\CategoryPersister;

class CreateCategoryHandler
{
    private CategoryFactory $categoryFactory;
    private CategoryPersister $categoryPersister;

    public function __construct(CategoryFactory $categoryFactory, CategoryPersister $categoryPersister)
    {
        $this->categoryFactory = $categoryFactory;
        $this->categoryPersister = $categoryPersister;
    }

    public function __invoke(CreateCategory $createCategory)
    {
        $name = $createCategory->getName();

        $category = $this->categoryFactory->create($name);

        $this->categoryPersister->persist($category);

        return $category;
    }
}