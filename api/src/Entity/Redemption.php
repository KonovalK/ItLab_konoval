<?php

namespace App\Entity;

use App\Repository\RedemptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RedemptionRepository::class)]
class Redemption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $creditId = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $nextContribution = null;

    #[ORM\Column]
    private ?int $contributionAmount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreditId(): ?int
    {
        return $this->creditId;
    }

    public function setCreditId(int $creditId): static
    {
        $this->creditId = $creditId;

        return $this;
    }

    public function getNextContribution(): ?\DateTimeInterface
    {
        return $this->nextContribution;
    }

    public function setNextContribution(\DateTimeInterface $nextContribution): static
    {
        $this->nextContribution = $nextContribution;

        return $this;
    }

    public function getContributionAmount(): ?int
    {
        return $this->contributionAmount;
    }

    public function setContributionAmount(int $contributionAmount): static
    {
        $this->contributionAmount = $contributionAmount;

        return $this;
    }
}
