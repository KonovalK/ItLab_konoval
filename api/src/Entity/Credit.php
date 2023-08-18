<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreditRepository::class)]
class Credit implements \JsonSerializable
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Client|null
     */
    #[ORM\ManyToOne(targetEntity: Client::class,inversedBy: "credits")]
    private ?Client $client = null;

    /**
     * @var CreditType|null
     */
    #[ORM\ManyToOne(targetEntity: CreditType::class,inversedBy: "credits")]
    private ?CreditType $creditType = null;

    /**
     * @var float|null
     */
    #[ORM\Column]
    private ?float $summa = null;

    /**
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $issueDate = null;

    /**
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finalDate = null;
    /**
     * @var Collection|null
     */
    #[ORM\OneToMany(mappedBy: "credit", targetEntity: Redemption::class)]
    private ?Collection $redemptions = null;

    /**
     * @return Collection|null
     */
    public function getRedemptions(): ?Collection
    {
        return $this->redemptions;
    }

    /**
     * @param Collection|null $redemptions
     * @return void
     */
    public function setRedemptions(?Collection $redemptions): void
    {
        $this->redemptions = $redemptions;
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client|null $client
     * @return void
     */
    public function setClient(?Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return CreditType|null
     */
    public function getCreditType(): ?CreditType
    {
        return $this->creditType;
    }

    /**
     * @param CreditType $creditType
     * @return $this
     */
    public function setCreditType(CreditType $creditType): self
    {
        $this->creditType = $creditType;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSumma(): ?float
    {
        return $this->summa;
    }

    /**
     * @param float $summa
     * @return $this
     */
    public function setSumma(float $summa): self
    {
        $this->summa = $summa;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface $issueDate
     * @return $this
     */
    public function setIssueDate(\DateTimeInterface $issueDate): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getFinalDate(): ?\DateTimeInterface
    {
        return $this->finalDate;
    }

    /**
     * @param \DateTimeInterface $finalDate
     * @return $this
     */
    public function setFinalDate(\DateTimeInterface $finalDate): self
    {
        $this->finalDate = $finalDate;

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
