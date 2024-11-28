<?php

namespace App\Entity;

use App\Repository\EnvoieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnvoieRepository::class)]
class Envoie
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'envoies')]
    #[ORM\JoinColumn(referencedColumnName: 'ref_produit', nullable: false)]
    protected ?Produit $refProduit = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'envoies')]
    #[ORM\JoinColumn(referencedColumnName: 'num_commande', nullable: false)]
    protected ?Commande $numCommande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $prixVenteProduitHT = null;

    #[ORM\Column]
    protected ?int $qttProduitCommande = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getRefProduit(): ?Produit
    {
        return $this->refProduit;
    }

    public function setRefProduit(?Produit $refProduit): static
    {
        $this->refProduit = $refProduit;

        return $this;
    }

    public function getNumCommande(): ?Commande
    {
        return $this->numCommande;
    }

    public function setNumCommande(?Commande $numCommande): static
    {
        $this->numCommande = $numCommande;

        return $this;
    }

    public function getPrixVenteProduitHT(): ?string
    {
        return $this->prixVenteProduitHT;
    }

    public function setPrixVenteProduitHT(string $prixVenteProduitHT): static
    {
        $this->prixVenteProduitHT = $prixVenteProduitHT;

        return $this;
    }

    public function getQttProduitCommande(): ?int
    {
        return $this->qttProduitCommande;
    }

    public function setQttProduitCommande(int $qttProduitCommande): static
    {
        $this->qttProduitCommande = $qttProduitCommande;

        return $this;
    }
}
