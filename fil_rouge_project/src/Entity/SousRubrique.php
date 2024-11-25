<?php

namespace App\Entity;

use App\Repository\SousRubriqueRepository;
use App\Entity\Rubrique;
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

    #[ORM\ManyToOne(targetEntity: Rubrique::class, inversedBy: 'sousRubriques')]
    #[ORM\JoinColumn(referencedColumnName: 'nom_rubrique', nullable: false)]
    private ?Rubrique $nomRubrique = null;

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

    public function getNomRubrique(): ?Rubrique
    {
        return $this->nomRubrique;
    }

    public function setNomRubrique(?Rubrique $nomRubrique): static
    {
        $this->nomRubrique = $nomRubrique;

        return $this;
    }
}
