<?php

namespace App\Entity;

use App\Repository\ResponsabiliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsabiliteRepository::class)]
class Responsabilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $mandat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'responsabiliteAttribuee', targetEntity: AttributionResponsabilite::class)]
    private Collection $attributionResponsabilites;

    public function __construct()
    {
        $this->attributionResponsabilites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMandat(): ?int
    {
        return $this->mandat;
    }

    public function setMandat(int $mandat): static
    {
        $this->mandat = $mandat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, AttributionResponsabilite>
     */
    public function getAttributionResponsabilites(): Collection
    {
        return $this->attributionResponsabilites;
    }

    public function addAttributionResponsabilite(AttributionResponsabilite $attributionResponsabilite): static
    {
        if (!$this->attributionResponsabilites->contains($attributionResponsabilite)) {
            $this->attributionResponsabilites->add($attributionResponsabilite);
            $attributionResponsabilite->setResponsabiliteAttribuee($this);
        }

        return $this;
    }

    public function removeAttributionResponsabilite(AttributionResponsabilite $attributionResponsabilite): static
    {
        if ($this->attributionResponsabilites->removeElement($attributionResponsabilite)) {
            // set the owning side to null (unless already changed)
            if ($attributionResponsabilite->getResponsabiliteAttribuee() === $this) {
                $attributionResponsabilite->setResponsabiliteAttribuee(null);
            }
        }

        return $this;
    }
}
