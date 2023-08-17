<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $desciption = null;
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "products")]
    private ?Category $category=null;

    #[ORM\OneToOne(targetEntity: ProductInfo::class)]
    private ?ProductInfo $productInfo=null;

    public function getProductInfo(): ?ProductInfo
    {
        return $this->productInfo;
    }

    public function setProductInfo(?ProductInfo $productInfo): void
    {
        $this->productInfo = $productInfo;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): void
    {
        $this->category = $category;
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDesciption(): ?string
    {
        return $this->desciption;
    }

    public function setDesciption(string $desciption): self
    {
        $this->desciption = $desciption;

        return $this;
    }

    public function jsonSerialize()
    {
        return["name"=>$this->getName(),"price"=>$this->getPrice(),"description"=>$this->getDesciption(),"category"=>$this->getCategory()];
    }
}
