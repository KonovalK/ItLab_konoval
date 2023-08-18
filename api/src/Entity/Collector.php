<?php

namespace App\Entity;

use App\Repository\CollectorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollectorRepository::class)]
class Collector implements \JsonSerializable
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
    private ?string $name = null;

    /**
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $phoneNumber = null;
    /**
     * @var Collection|null
     */
    #[ORM\ManyToOne(targetEntity: Debtor::class,inversedBy: "collector")]
    private ?Collection $debtors = null;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

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
