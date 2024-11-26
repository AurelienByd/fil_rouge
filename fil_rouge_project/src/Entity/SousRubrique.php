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

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'nomSsRubrique')]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setNomSsRubrique($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getNomSsRubrique() === $this) {
                $produit->setNomSsRubrique(null);
            }
        }

        return $this;
    }
}
