<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Test implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $test = null;

    public function getTest(): ?string
    {
        return $this->test;
    }

    public function setTest(?string $test): void
    {
        $this->test = $test;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }



    public function jsonSerialize()
    {
        return["id"=>$this->getId(),"info"=>$this->getInfo()];
    }
}
