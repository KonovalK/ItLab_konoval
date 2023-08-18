<?php

namespace App\Entity;

use App\Repository\CreditTypeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreditTypeRepository::class)]
class CreditType implements \JsonSerializable
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    /**
     * @var string|null
     */
    #[ORM\Column(type: Types::TEXT)]
    private ?string $conditions = null;

    /**
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $term = null;

    /**
     * @var int|null
     */
    #[ORM\Column]
    private ?int $bid = null;
    /**
     * @var Collection|null
     */
    #[ORM\OneToMany(mappedBy: "creditType",targetEntity: Credit::class)]
    private ?Collection $credits;

    /**
     * @return Collection|null
     */
    public function getCredits(): ?Collection
    {
        return $this->credits;
    }

    /**
     * @param Collection|null $credits
     * @return void
     */
    public function setCredits(?Collection $credits): void
    {
        $this->credits = $credits;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    /**
     * @param string $conditions
     * @return $this
     */
    public function setConditions(string $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getTerm(): ?\DateTimeInterface
    {
        return $this->term;
    }

    /**
     * @param \DateTimeInterface $term
     * @return $this
     */
    public function setTerm(\DateTimeInterface $term): self
    {
        $this->term = $term;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBid(): ?int
    {
        return $this->bid;
    }

    /**
     * @param int $bid
     * @return $this
     */
    public function setBid(int $bid): self
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * @return void
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}
