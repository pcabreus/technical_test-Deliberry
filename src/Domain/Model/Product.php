<?php

namespace App\Domain\Model;

abstract class Product implements Timestampable
{
    protected ?int $id;

    protected string $name;

    protected ?int $basePrice;

    protected ?string $description;

    protected iterable $categories;

    protected ?\DateTime $createdAt;

    protected ?\DateTime $updatedAt;

    public function __construct()
    {
        $this->id = null;
        $this->createdAt = null;
        $this->updatedAt = null;
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

    public function getBasePrice(): ?int
    {
        return $this->basePrice;
    }

    public function setBasePrice(?int $basePrice): self
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return iterable|Category[]
     */
    public function getCategories(): iterable
    {
        return $this->categories;
    }

    public function setCategories(iterable $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public abstract function addCategory(Category $category): self;

    public abstract function removeCategory(Category $category): self;

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}