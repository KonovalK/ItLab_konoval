<?php

namespace App\Entity;

use App\Repository\DebtorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DebtorRepository::class)]
class Debtor implements \JsonSerializable
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
    #[ORM\OneToOne(targetEntity: Client::class)]
    private ?Client $client = null;

    /**
     * @var Credit|null
     */
    #[ORM\OneToOne(targetEntity: Credit::class)]
    private ?Credit $credit = null;
    /**
     * @var Collector|null
     */
    #[ORM\OneToMany(mappedBy: "debtors", targetEntity: Collector::class)]
    private ?Collector $collector = null;

    /**
     * @return Collector|null
     */
    public function getCollector(): ?Collector
    {
        return $this->collector;
    }

    /**
     * @param Collector|null $collector
     * @return void
     */
    public function setCollector(?Collector $collector): void
    {
        $this->collector = $collector;
    }

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
     * @param int|null $id
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return void
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}
