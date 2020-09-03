<?php

namespace App\Infrastructure\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Infrastructure\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Model\Product as BaseProduct;
use App\Domain\Model\Category as BaseCategory;

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
    protected ?int $id;

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
     * @var Collection|BaseCategory[]
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products")
     */
    protected iterable $categories;

    /**
     * @ORM\Column(type="datetime")
     */
    protected ?\DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected ?\DateTime $updatedAt;

    public function __construct()
    {
        parent::__construct();
        $this->categories = new ArrayCollection();
    }

    public function addCategory(BaseCategory $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(BaseCategory $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

}
