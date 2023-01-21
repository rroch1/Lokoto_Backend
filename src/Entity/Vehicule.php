<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
#[ApiResource]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $immatriculationPlate = null;

    #[ORM\Column(length: 100)]
    private ?string $status = null;

    #[ORM\Column(length: 50)]
    private ?string $registrationDocumentNumber = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\Column(length: 50)]
    private ?string $brand = null;

    #[ORM\Column(length: 20)]
    private ?string $engineType = null;

    #[ORM\Column(length: 20)]
    private ?string $carType = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $owner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculationPlate(): ?string
    {
        return $this->immatriculationPlate;
    }

    public function setImmatriculationPlate(string $immatriculationPlate): self
    {
        $this->immatriculationPlate = $immatriculationPlate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRegistrationDocumentNumber(): ?string
    {
        return $this->registrationDocumentNumber;
    }

    public function setRegistrationDocumentNumber(string $registrationDocumentNumber): self
    {
        $this->registrationDocumentNumber = $registrationDocumentNumber;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getEngineType(): ?string
    {
        return $this->engineType;
    }

    public function setEngineType(string $engineType): self
    {
        $this->engineType = $engineType;

        return $this;
    }

    public function getCarType(): ?string
    {
        return $this->carType;
    }

    public function setCarType(string $carType): self
    {
        $this->carType = $carType;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
