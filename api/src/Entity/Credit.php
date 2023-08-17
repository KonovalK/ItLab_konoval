<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreditRepository::class)]
class Credit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $clientId = null;

    #[ORM\Column]
    private ?CreditType $creditType = null;

    #[ORM\Column]
    private ?float $summa = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $issueDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finalDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getCreditType(): ?CreditType
    {
        return $this->creditType;
    }

    public function setCreditType(CreditType $creditType): self
    {
        $this->creditType = $creditType;

        return $this;
    }

    public function getSumma(): ?float
    {
        return $this->summa;
    }

    public function setSumma(float $summa): self
    {
        $this->summa = $summa;

        return $this;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(\DateTimeInterface $issueDate): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    public function getFinalDate(): ?\DateTimeInterface
    {
        return $this->finalDate;
    }

    public function setFinalDate(\DateTimeInterface $finalDate): self
    {
        $this->finalDate = $finalDate;

        return $this;
    }
}
