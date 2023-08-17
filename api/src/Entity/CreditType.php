<?php

namespace App\Entity;

use App\Repository\CreditTypeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreditTypeRepository::class)]
class CreditType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $conditions = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $term = null;

    #[ORM\Column]
    private ?int $bid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getTerm(): ?\DateTimeInterface
    {
        return $this->term;
    }

    public function setTerm(\DateTimeInterface $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getBid(): ?int
    {
        return $this->bid;
    }

    public function setBid(int $bid): self
    {
        $this->bid = $bid;

        return $this;
    }
}
