<?php

namespace App\Entity;

use App\Repository\SelectionneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SelectionneRepository::class)]
class Selectionne
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'selectionnes')]
    #[ORM\JoinColumn(referencedColumnName: 'ref_produit', nullable: false)]
    private ?Produit $refProduit = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'selectionnes')]
    #[ORM\JoinColumn(referencedColumnName: 'ref_client', nullable: false)]
    private ?Client $refClient = null;

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

    public function getRefClient(): ?Client
    {
        return $this->refClient;
    }

    public function setRefClient(?Client $refClient): static
    {
        $this->refClient = $refClient;

        return $this;
    }
}
