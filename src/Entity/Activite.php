<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $programme = null;

    #[ORM\OneToMany(mappedBy: 'ActiviteProgrammee', targetEntity: AttributionActivite::class)]
    private Collection $attributionActivites;

    public function __construct()
    {
        $this->attributionActivites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getProgramme(): ?string
    {
        return $this->programme;
    }

    public function setProgramme(string $programme): static
    {
        $this->programme = $programme;

        return $this;
    }

    /**
     * @return Collection<int, AttributionActivite>
     */
    public function getAttributionActivites(): Collection
    {
        return $this->attributionActivites;
    }

    public function addAttributionActivite(AttributionActivite $attributionActivite): static
    {
        if (!$this->attributionActivites->contains($attributionActivite)) {
            $this->attributionActivites->add($attributionActivite);
            $attributionActivite->setActiviteProgrammee($this);
        }

        return $this;
    }

    public function removeAttributionActivite(AttributionActivite $attributionActivite): static
    {
        if ($this->attributionActivites->removeElement($attributionActivite)) {
            // set the owning side to null (unless already changed)
            if ($attributionActivite->getActiviteProgrammee() === $this) {
                $attributionActivite->setActiviteProgrammee(null);
            }
        }

        return $this;
    }
}
