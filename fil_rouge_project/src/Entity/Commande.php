<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column]
    protected ?int $numCommande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    protected ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column]
    protected ?int $nbExpedCommande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $totalHT = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $taxeTVA = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $totalTTC = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $totalCommande = null;

    #[ORM\Column]
    protected ?int $delaiPaiement = null;

    #[ORM\Column(length: 20)]
    protected ?string $modePaiement = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    protected ?string $penaliteRetard = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    protected ?\DateTimeInterface $tempsConservDocs = null;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(referencedColumnName: 'ref_client', nullable: false)]
    protected ?Client $refClient = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNumCommande(): ?int
    {
        return $this->numCommande;
    }

    public function setNumCommande(int $numCommande): static
    {
        $this->numCommande = $numCommande;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getNbExpedCommande(): ?int
    {
        return $this->nbExpedCommande;
    }

    public function setNbExpedCommande(int $nbExpedCommande): static
    {
        $this->nbExpedCommande = $nbExpedCommande;

        return $this;
    }

    public function getTotalHT(): ?string
    {
        return $this->totalHT;
    }

    public function setTotalHT(string $totalHT): static
    {
        $this->totalHT = $totalHT;

        return $this;
    }

    public function getTaxeTVA(): ?string
    {
        return $this->taxeTVA;
    }

    public function setTaxeTVA(string $taxeTVA): static
    {
        $this->taxeTVA = $taxeTVA;

        return $this;
    }

    public function getTotalTTC(): ?string
    {
        return $this->totalTTC;
    }

    public function setTotalTTC(string $totalTTC): static
    {
        $this->totalTTC = $totalTTC;

        return $this;
    }

    public function getTotalCommande(): ?string
    {
        return $this->totalCommande;
    }

    public function setTotalCommande(string $totalCommande): static
    {
        $this->totalCommande = $totalCommande;

        return $this;
    }

    public function getDelaiPaiement(): ?int
    {
        return $this->delaiPaiement;
    }

    public function setDelaiPaiement(int $delaiPaiement): static
    {
        $this->delaiPaiement = $delaiPaiement;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): static
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getPenaliteRetard(): ?string
    {
        return $this->penaliteRetard;
    }

    public function setPenaliteRetard(string $penaliteRetard): static
    {
        $this->penaliteRetard = $penaliteRetard;

        return $this;
    }

    public function getTempsConservDocs(): ?\DateTimeInterface
    {
        return $this->tempsConservDocs;
    }

    public function setTempsConservDocs(\DateTimeInterface $tempsConservDocs): static
    {
        $this->tempsConservDocs = $tempsConservDocs;

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
