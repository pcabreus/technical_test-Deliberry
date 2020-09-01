<?php

namespace App\Domain\Persister;

use App\Domain\Model\Category;

interface CategoryPersister
{
    public function persist(Category $category, $flush = true);
}