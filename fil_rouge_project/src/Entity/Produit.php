<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use App\Entity\SousRubrique;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column(length: 5)]
    private ?string $refProduit = null;

    #[ORM\Column(length: 20)]
    private ?string $nomProduit = null;

    #[ORM\Column(length: 50)]
    private ?string $descrProduit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prixAchatProduit = null;

    #[ORM\Column(length: 100)]
    private ?string $photoProduit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prixVenteProduitHT = null;

    #[ORM\Column]
    private ?int $stockProduit = null;

    #[ORM\Column]
    private ?bool $valideProduit = null;

    #[ORM\Column]
    private ?bool $activeProduit = null;

    #[ORM\ManyToOne(targetEntity: SousRubrique::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(referencedColumnName: 'nom_ss_rubrique', nullable: false)]
    private ?SousRubrique $nomSsRubrique = null;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(referencedColumnName: 'ref_fournisseur_produit', nullable: false)]
    private ?Fournisseur $refFournisseurProduit = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getRefProduit(): ?string
    {
        return $this->refProduit;
    }

    public function setRefProduit(string $refProduit): static
    {
        $this->refProduit = $refProduit;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): static
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getDescrProduit(): ?string
    {
        return $this->descrProduit;
    }

    public function setDescrProduit(string $descrProduit): static
    {
        $this->descrProduit = $descrProduit;

        return $this;
    }

    public function getPrixAchatProduit(): ?string
    {
        return $this->prixAchatProduit;
    }

    public function setPrixAchatProduit(string $prixAchatProduit): static
    {
        $this->prixAchatProduit = $prixAchatProduit;

        return $this;
    }

    public function getPhotoProduit(): ?string
    {
        return $this->photoProduit;
    }

    public function setPhotoProduit(string $photoProduit): static
    {
        $this->photoProduit = $photoProduit;

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

    public function getStockProduit(): ?int
    {
        return $this->stockProduit;
    }

    public function setStockProduit(int $stockProduit): static
    {
        $this->stockProduit = $stockProduit;

        return $this;
    }

    public function isValideProduit(): ?bool
    {
        return $this->valideProduit;
    }

    public function setValideProduit(bool $valideProduit): static
    {
        $this->valideProduit = $valideProduit;

        return $this;
    }

    public function isActiveProduit(): ?bool
    {
        return $this->activeProduit;
    }

    public function setActiveProduit(bool $activeProduit): static
    {
        $this->activeProduit = $activeProduit;

        return $this;
    }

    public function getNomSsRubrique(): ?SousRubrique
    {
        return $this->nomSsRubrique;
    }

    public function setNomSsRubrique(?SousRubrique $nomSsRubrique): static
    {
        $this->nomSsRubrique = $nomSsRubrique;

        return $this;
    }

    public function getRefFournisseurProduit(): ?Fournisseur
    {
        return $this->refFournisseurProduit;
    }

    public function setRefFournisseurProduit(?Fournisseur $refFournisseurProduit): static
    {
        $this->refFournisseurProduit = $refFournisseurProduit;

        return $this;
    }
}
