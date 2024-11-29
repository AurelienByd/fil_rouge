<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column]
    protected ?int $numFacture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    protected ?\DateTimeInterface $dateFacture = null;

    #[ORM\OneToOne(targetEntity: Commande::class, inversedBy: 'facture', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(referencedColumnName: 'num_commande', nullable: false)]
    protected ?Commande $numCommande = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNumFacture(): ?int
    {
        return $this->numFacture;
    }

    public function setNumFacture(int $numFacture): static
    {
        $this->numFacture = $numFacture;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): static
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getNumCommande(): ?Commande
    {
        return $this->numCommande;
    }

    public function setNumCommande(Commande $numCommande): static
    {
        $this->numCommande = $numCommande;

        return $this;
    }
}
