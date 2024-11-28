<?php

namespace App\Entity;

use App\Repository\BonDeLivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonDeLivraisonRepository::class)]
class BonDeLivraison
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column]
    protected ?int $numBonLivraison = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    protected ?\DateTimeInterface $dateBonLivraison = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNumBonLivraison(): ?int
    {
        return $this->numBonLivraison;
    }

    public function setNumBonLivraison(int $numBonLivraison): static
    {
        $this->numBonLivraison = $numBonLivraison;

        return $this;
    }

    public function getDateBonLivraison(): ?\DateTimeInterface
    {
        return $this->dateBonLivraison;
    }

    public function setDateBonLivraison(\DateTimeInterface $dateBonLivraison): static
    {
        $this->dateBonLivraison = $dateBonLivraison;

        return $this;
    }
}
