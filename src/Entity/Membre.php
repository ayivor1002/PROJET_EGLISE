<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
class Membre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?Membre $prenom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?Membre $mere = null;

    #[ORM\Column(length: 10)]
    private ?string $sexe = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $dateNaissance = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $lieuNaissance = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $situationMatrimoniale = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $etat = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $historique = null;

    #[ORM\ManyToOne(inversedBy: 'membres')]
    private ?Eglise $egliseDappartenance = null;

    #[ORM\OneToMany(mappedBy: 'MembreDesigne', targetEntity: AttributionActivite::class)]
    private Collection $attributionActivites;

    #[ORM\OneToMany(mappedBy: 'membreResponsable', targetEntity: AttributionResponsabilite::class)]
    private Collection $attributionResponsabilites;

    public function __construct()
    {
        $this->atributionActivites = new ArrayCollection();
        $this->atributionResponsables = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMere(): ?string
    {
        return $this->mere;
    }

    public function setMere(?string $mere): static
    {
        $this->mere = $mere;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?string $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): static
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getSituationMatrimoniale(): ?string
    {
        return $this->situationMatrimoniale;
    }

    public function setSituationMatrimoniale(?string $situationMatrimoniale): static
    {
        $this->situationMatrimoniale = $situationMatrimoniale;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getHistorique(): ?string
    {
        return $this->historique;
    }

    public function setHistorique(?string $historique): static
    {
        $this->historique = $historique;

        return $this;
    }

    public function getEgliseDappartenance(): ?Eglise
    {
        return $this->egliseDappartenance;
    }

    public function setEgliseDappartenance(?Eglise $egliseDappartenance): static
    {
        $this->egliseDappartenance = $egliseDappartenance;

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
            $attributionActivite->setMembreDesigne($this);
        }

        return $this;
    }

    public function removeAttributionActivite(AttributionActivite $attributionActivite): static
    {
        if ($this->attributionActivites->removeElement($attributionActivite)) {
            // set the owning side to null (unless already changed)
            if ($attributionActivite->getMembreDesigne() === $this) {
                $attributionActivite->setMembreDesigne(null);
            }
        }

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
            $attributionResponsabilite->setMembreResponsabilite($this);
        }

        return $this;
    }

    public function removeAttributionResponsabilite(AttributionResponsabilite $attributionResponsabilite): static
    {
        if ($this->attributionResponsabilites->removeElement($attributionResponsabilite)) {
            // set the owning side to null (unless already changed)
            if ($attributionResponsabilite->getMembreResponsable() === $this) {
                $attributionResponsabilite->setMembreResponsable(null);
            }
        }

        return $this;
    }
}
