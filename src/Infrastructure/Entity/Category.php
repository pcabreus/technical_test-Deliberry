<?php

namespace App\Infrastructure\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Infrastructure\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Model\Category as BaseCategory;
use App\Domain\Model\Product as BaseProduct;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category extends BaseCategory
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
    protected ?string $name;

    /**
     * @var Collection|BaseProduct[]
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="categories")
     * @ApiSubresource()
     */
    protected iterable $products;

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->products = new ArrayCollection();
    }


    public function addProduct(BaseProduct $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addCategory($this);
        }

        return $this;
    }

    public function removeProduct(BaseProduct $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->removeCategory($this);
        }

        return $this;
    }
}
