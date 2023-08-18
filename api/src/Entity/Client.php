<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client implements \JsonSerializable
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
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    /**
     * @var string|null
     */
    #[ORM\Column(length: 13)]
    private ?string $pasportNumber = null;

    /**
     * @var Collection|null
     */
    #[ORM\OneToMany(mappedBy: "client", targetEntity: Credit::class)]
    private ?Collection $credits = null;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
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
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     * @return $this
     */
    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPasportNumber(): ?string
    {
        return $this->pasportNumber;
    }

    /**
     * @param string $pasportNumber
     * @return $this
     */
    public function setPasportNumber(string $pasportNumber): self
    {
        $this->pasportNumber = $pasportNumber;

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
