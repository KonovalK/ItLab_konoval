<?php

namespace App\Entity;

use App\Repository\DebtorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DebtorRepository::class)]
class Debtor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $clientId = null;

    #[ORM\Column]
    private ?int $creditId = null;
    #[ORM\Column]
    private ?int $collectorId = null;

    public function getCollectorId(): ?int
    {
        return $this->collectorId;
    }

    public function setCollectorId(?int $collectorId): void
    {
        $this->collectorId = $collectorId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): static
    {
        $this->clientId = $clientId;

        return $this;
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
}
