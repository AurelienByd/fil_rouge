<?php

namespace App\Entity;

use App\Repository\SousRubriqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousRubriqueRepository::class)]
class SousRubrique
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $nomSsRubrique = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNomSsRubrique(): ?string
    {
        return $this->nomSsRubrique;
    }

    public function setNomSsRubrique(string $nomSsRubrique): static
    {
        $this->nomSsRubrique = $nomSsRubrique;

        return $this;
    }
}
