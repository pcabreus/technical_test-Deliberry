<?php

namespace App\Infrastructure\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Infrastructure\Repository\ProductRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Model\Product as BaseProduct;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"name": "partial", "description": "partial"})
 */
class Product extends BaseProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected string $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $basePrice;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected ?string $description;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products")
     */
    protected Collection $categories;

    /**
     * @ORM\Column(type="datetime")
     */
    protected ?\DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected ?\DateTime $updatedAt;
}
