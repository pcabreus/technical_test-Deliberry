<?php


namespace App\Infrastructure\Persister;

use App\Domain\Model\Category;
use App\Domain\Persister\CategoryPersister as BaseCategoryPersister;
use Doctrine\ORM\EntityManagerInterface;

class CategoryPersister implements BaseCategoryPersister
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function persist(Category $category, $flush = true)
    {
        $this->entityManager->persist($category);

        if ($flush) {
            $this->entityManager->flush();
        }

        return $category;
    }
}