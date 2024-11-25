<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use App\Entity\SousRubrique;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RubriqueRepository::class)]
class Rubrique
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $nomRubrique = null;

    /**
     * @var Collection<int, SousRubrique>
     */
    #[ORM\OneToMany(targetEntity: SousRubrique::class, mappedBy: 'nomRubrique')]
    private Collection $sousRubriques;

    public function __construct()
    {
        $this->sousRubriques = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNomRubrique(): ?string
    {
        return $this->nomRubrique;
    }

    public function setNomRubrique(string $nomRubrique): static
    {
        $this->nomRubrique = $nomRubrique;

        return $this;
    }

    /**
     * @return Collection<int, SousRubrique>
     */
    public function getSousRubriques(): Collection
    {
        return $this->sousRubriques;
    }

    public function addSousRubrique(SousRubrique $sousRubrique): static
    {
        if (!$this->sousRubriques->contains($sousRubrique)) {
            $this->sousRubriques->add($sousRubrique);
            $sousRubrique->setNomRubrique($this);
        }

        return $this;
    }

    public function removeSousRubrique(SousRubrique $sousRubrique): static
    {
        if ($this->sousRubriques->removeElement($sousRubrique)) {
            // set the owning side to null (unless already changed)
            if ($sousRubrique->getNomRubrique() === $this) {
                $sousRubrique->setNomRubrique(null);
            }
        }

        return $this;
    }
}
