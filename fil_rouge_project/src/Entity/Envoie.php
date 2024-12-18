<?php

namespace App\Entity;

use App\Repository\EnvoieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnvoieRepository::class)]
class Envoie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $prixVenteProduitHT = null;

    #[ORM\Column]
    protected ?int $qttProduitCommande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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
