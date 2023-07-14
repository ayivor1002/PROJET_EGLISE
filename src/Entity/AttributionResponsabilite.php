<?php

namespace App\Entity;

use App\Repository\AttributionResponsabiliteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributionResponsabiliteRepository::class)]
class AttributionResponsabilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePriseEnCharge = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFinCharge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bilan = null;

    
    #[ORM\ManyToOne(inversedBy: 'attributionResponsabilites')]
    private ?Membre $membreResponsable = null;

    #[ORM\ManyToOne(inversedBy: 'attributionResponsabilites')]
    private ?Responsabilite $responsabiliteAttribuee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePriseEnCharge(): ?\DateTimeInterface
    {
        return $this->datePriseEnCharge;
    }

    public function setDatePriseEnCharge(\DateTimeInterface $datePriseEnCharge): static
    {
        $this->datePriseEnCharge = $datePriseEnCharge;

        return $this;
    }

    public function getDateFinCharge(): ?\DateTimeInterface
    {
        return $this->dateFinCharge;
    }

    public function setDateFinCharge(\DateTimeInterface $dateFinCharge): static
    {
        $this->dateFinCharge = $dateFinCharge;

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

    public function getMembreResponsable(): ?Membre
    {
        return $this->membreResponsable;
    }

    public function setMembreResponsable(?Membre $membreResponsable): static
    {
        $this->membreResponsable = $membreResponsable;

        return $this;
    }

    public function getResponsabiliteAttribuee(): ?Responsabilite
    {
        return $this->responsabiliteAttribuee;
    }

    public function setResponsabiliteAttribuee(?Responsabilite $responsabiliteAttribuee): static
    {
        $this->responsabiliteAttribuee = $responsabiliteAttribuee;

        return $this;
    }
}
