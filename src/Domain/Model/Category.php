<?php

namespace App\Domain\Model;

abstract class Category
{
    protected int $id;

    protected ?string $name;

    /** @var iterable|Product[] */
    protected iterable $products;

    public function __construct(string $name = null)
    {
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return iterable|Product[]
     */
    public function getProducts(): iterable
    {
        return $this->products;
    }

    public abstract function addProduct(Product $product): self;

    public abstract function removeProduct(Product $product): self;
}