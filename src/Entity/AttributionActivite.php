<?php

namespace App\Entity;

use App\Repository\AttributionActiviteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributionActiviteRepository::class)]
class AttributionActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateFin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bilan = null;

    #[ORM\ManyToOne(inversedBy: 'attributionActivites')]
    private ?Membre $MembreDesigne = null;

    #[ORM\ManyToOne(inversedBy: 'attributionActivites')]
    private ?Activite $ActiviteProgrammee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): static
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(?string $bilan): static
    {
        $this->bilan = $bilan;

        return $this;
    }

    public function getMembreDesigne(): ?Membre
    {
        return $this->MembreDesigne;
    }

    public function setMembreDesigne(?Membre $MembreDesigne): static
    {
        $this->MembreDesigne = $MembreDesigne;

        return $this;
    }

    public function getActiviteProgrammee(): ?Activite
    {
        return $this->ActiviteProgrammee;
    }

    public function setActiviteProgrammee(?Activite $ActiviteProgrammee): static
    {
        $this->ActiviteProgrammee = $ActiviteProgrammee;

        return $this;
    }
}
