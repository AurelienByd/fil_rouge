<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    protected ?string $refFournisseurProduit = null;

    #[ORM\Column(length: 30)]
    protected ?string $nomFournisseur = null;

    #[ORM\Column(length: 15)]
    protected ?string $typeFournisseur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getRefFournisseurProduit(): ?string
    {
        return $this->refFournisseurProduit;
    }

    public function setRefFournisseurProduit(string $refFournisseurProduit): static
    {
        $this->refFournisseurProduit = $refFournisseurProduit;

        return $this;
    }

    public function getNomFournisseur(): ?string
    {
        return $this->nomFournisseur;
    }

    public function setNomFournisseur(string $nomFournisseur): static
    {
        $this->nomFournisseur = $nomFournisseur;

        return $this;
    }

    public function getTypeFournisseur(): ?string
    {
        return $this->typeFournisseur;
    }

    public function setTypeFournisseur(string $typeFournisseur): static
    {
        $this->typeFournisseur = $typeFournisseur;

        return $this;
    }
}
