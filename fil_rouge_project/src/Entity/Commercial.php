<?php

namespace App\Entity;

use App\Repository\CommercialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommercialRepository::class)]
class Commercial
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column(length: 5)]
    private ?string $refCommercial = null;

    #[ORM\Column(length: 30)]
    private ?string $nomCommercial = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getRefCommercial(): ?string
    {
        return $this->refCommercial;
    }

    public function setRefCommercial(string $refCommercial): static
    {
        $this->refCommercial = $refCommercial;

        return $this;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(string $nomCommercial): static
    {
        $this->nomCommercial = $nomCommercial;

        return $this;
    }
}
