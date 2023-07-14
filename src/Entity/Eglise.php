<?php

namespace App\Entity;
use App\Entity\Membre;
use App\Repository\EgliseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EgliseRepository::class)]
class Eglise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $slogan = null;

    #[ORM\Column(length: 100)]
    private ?Membre $pasteur = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $diacre = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse = null;

    #[ORM\Column(length: 100)]
    private ?string $localisation = null;

    #[ORM\Column(length: 100)]
    private ?string $contact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $programme = null;

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

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): static
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getPasteur(): ?string
    {
        return $this->pasteur;
    }

    public function setPasteur(string $pasteur): static
    {
        $this->pasteur = $pasteur;

        return $this;
    }

    public function getDiacre(): ?array
    {
        return $this->diacre;
    }

    public function setDiacre(?array $diacre): static
    {
        $this->diacre = $diacre;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): static
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

    public function getProgramme(): ?string
    {
        return $this->programme;
    }

    public function setProgramme(string $programme): static
    {
        $this->programme = $programme;

        return $this;
    }
}
