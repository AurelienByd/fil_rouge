<?php

namespace App\Entity;

use App\Repository\SousRubriqueRepository;
use App\Entity\Rubrique;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousRubriqueRepository::class)]
class SousRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    protected ?string $nomSsRubrique = null;

    #[ORM\ManyToOne(inversedBy: 'sousRubriques')]
    #[ORM\JoinColumn(nullable: false)]
    protected ?Rubrique $rubrique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNomSsRubrique(): ?string
    {
        return $this->nomSsRubrique;
    }

    public function setNomSsRubrique(string $nomSsRubrique): static
    {
        $this->nomSsRubrique = $nomSsRubrique;

        return $this;
    }

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): static
    {
        $this->rubrique = $rubrique;

        return $this;
    }
}
