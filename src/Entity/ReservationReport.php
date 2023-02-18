<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationReportRepository::class)]
#[ApiResource]
class ReservationReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $reportDateTime = null;

    #[ORM\Column(length: 255)]
    private ?string $vehiculeState = null;

    #[ORM\Column(length: 255)]
    private ?string $reportNote = null;

    #[ORM\OneToMany(mappedBy: 'reservationReport', targetEntity: Vehicule::class)]
    private Collection $vehiculeReserved;

    #[ORM\OneToMany(mappedBy: 'report', targetEntity: AttachedFile::class)]
    private Collection $attachedFiles;

    public function __construct()
    {
        $this->vehiculeReserved = new ArrayCollection();
        $this->attachedFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReportDateTime(): ?\DateTimeInterface
    {
        return $this->reportDateTime;
    }

    public function setReportDateTime(\DateTimeInterface $reportDateTime): self
    {
        $this->reportDateTime = $reportDateTime;

        return $this;
    }

    public function getVehiculeState(): ?string
    {
        return $this->vehiculeState;
    }

    public function setVehiculeState(string $vehiculeState): self
    {
        $this->vehiculeState = $vehiculeState;

        return $this;
    }

    public function getReportNote(): ?string
    {
        return $this->reportNote;
    }

    public function setReportNote(string $reportNote): self
    {
        $this->reportNote = $reportNote;

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehiculeReserved(): Collection
    {
        return $this->vehiculeReserved;
    }

    public function addVehiculeReserved(Vehicule $vehiculeReserved): self
    {
        if (!$this->vehiculeReserved->contains($vehiculeReserved)) {
            $this->vehiculeReserved->add($vehiculeReserved);
            $vehiculeReserved->setReservationReport($this);
        }

        return $this;
    }

    public function removeVehiculeReserved(Vehicule $vehiculeReserved): self
    {
        if ($this->vehiculeReserved->removeElement($vehiculeReserved)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeReserved->getReservationReport() === $this) {
                $vehiculeReserved->setReservationReport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AttachedFile>
     */
    public function getAttachedFiles(): Collection
    {
        return $this->attachedFiles;
    }

    public function addAttachedFile(AttachedFile $attachedFile): self
    {
        if (!$this->attachedFiles->contains($attachedFile)) {
            $this->attachedFiles->add($attachedFile);
            $attachedFile->setReport($this);
        }

        return $this;
    }

    public function removeAttachedFile(AttachedFile $attachedFile): self
    {
        if ($this->attachedFiles->removeElement($attachedFile)) {
            // set the owning side to null (unless already changed)
            if ($attachedFile->getReport() === $this) {
                $attachedFile->setReport(null);
            }
        }

        return $this;
    }
}
