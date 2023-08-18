<?php

namespace App\Entity;

use App\Repository\RedemptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RedemptionRepository::class)]
class Redemption implements \JsonSerializable
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Credit|null
     */
    #[ORM\ManyToOne(targetEntity: Credit::class,inversedBy: "redemptions")]
    private ?Credit $credit = null;

    /**
     * @return Credit|null
     */
    public function getCredit(): ?Credit
    {
        return $this->credit;
    }

    /**
     * @param Credit|null $credit
     * @return void
     */
    public function setCredit(?Credit $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $nextContribution = null;

    /**
     * @var int|null
     */
    #[ORM\Column]
    private ?int $contributionAmount = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return \DateTimeInterface|null
     */
    public function getNextContribution(): ?\DateTimeInterface
    {
        return $this->nextContribution;
    }

    /**
     * @param \DateTimeInterface $nextContribution
     * @return $this
     */
    public function setNextContribution(\DateTimeInterface $nextContribution): static
    {
        $this->nextContribution = $nextContribution;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getContributionAmount(): ?int
    {
        return $this->contributionAmount;
    }

    /**
     * @param int $contributionAmount
     * @return $this
     */
    public function setContributionAmount(int $contributionAmount): static
    {
        $this->contributionAmount = $contributionAmount;

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
