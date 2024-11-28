<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER', fields: ['refClient', 'contactClient'])]
class Client implements UserInterface, PasswordAuthenticatedUserInterface
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column(length: 20, unique: true)]
    protected ?string $refClient = null;

    #[ORM\Column(length: 30)]
    protected ?string $nomClient = null;

    #[ORM\Column(length: 50)]
    protected ?string $adresseLivraisonClient = null;

    #[ORM\Column(length: 50)]
    protected ?string $adresseFacturationClient = null;

    #[ORM\Column(length: 50, unique: true)]
    protected ?string $contactClient = null;

    #[ORM\Column]
    protected ?int $coeffClient = null;

    /**
     * @var list<string> The user category
     */
    #[ORM\Column]
    protected array $catClient = [];
    /**
     * @var string The hashed password
     */

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    protected ?\DateTimeInterface $dateInscrClient = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    protected ?string $reducPourClient = null;

    #[ORM\Column(length: 50)]
    protected ?string $mdpClient = null;

    #[ORM\ManyToOne(targetEntity: Commercial::class, inversedBy: 'clients')]
    #[ORM\JoinColumn(referencedColumnName: 'ref_commercial', nullable: false)]
    protected ?Commercial $refCommercial = null;

    /**
     * @var Collection<int, Selectionne>
     */
    #[ORM\OneToMany(targetEntity: Selectionne::class, mappedBy: 'refClient')]
    protected Collection $selectionnes;

    /**
     * @var Collection<int, Commande>
     */
    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'refClient')]
    protected Collection $commandes;

    public function __construct()
    {
        $this->selectionnes = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getRefClient(): ?string
    {
        return $this->refClient;
    }

    public function setRefClient(string $refClient): static
    {
        $this->refClient = $refClient;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): static
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getAdresseLivraisonClient(): ?string
    {
        return $this->adresseLivraisonClient;
    }

    public function setAdresseLivraisonClient(string $adresseLivraisonClient): static
    {
        $this->adresseLivraisonClient = $adresseLivraisonClient;

        return $this;
    }

    public function getAdresseFacturationClient(): ?string
    {
        return $this->adresseFacturationClient;
    }

    public function setAdresseFacturationClient(string $adresseFacturationClient): static
    {
        $this->adresseFacturationClient = $adresseFacturationClient;

        return $this;
    }

    public function getContactClient(): ?string
    {
        return $this->contactClient;
    }

    public function setContactClient(string $contactClient): static
    {
        $this->contactClient = $contactClient;

        return $this;
    }

    public function getCoeffClient(): ?int
    {
        return $this->coeffClient;
    }

    public function setCoeffClient(int $coeffClient): static
    {
        $this->coeffClient = $coeffClient;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->refClient;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $catClient = $this->catClient;
        // guarantee every user at least has ROLE_USER
        $catClient[] = 'ROLE_USER';

        return array_unique($catClient);
    }

    /**
     * @param list<string> $catClient
     */
    public function setRoles(array $catClient): static
    {
        $this->catClient = $catClient;

        return $this;
    }

    public function getDateInscrClient(): \DateTimeInterface|string|null
    {
        return $this->dateInscrClient;
    }

    public function setDateInscrClient(\DateTimeInterface $dateInscrClient): static
    {
        $this->dateInscrClient = $dateInscrClient;

        return $this;
    }

    public function getReducPourClient(): ?string
    {
        return $this->reducPourClient;
    }

    public function setReducPourClient(string $reducPourClient): static
    {
        $this->reducPourClient = $reducPourClient;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->mdpClient;
    }

    public function setPassword(string $mdpClient): static
    {
        $this->mdpClient = $mdpClient;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRefCommercial(): ?Commercial
    {
        return $this->refCommercial;
    }

    public function setRefCommercial(?Commercial $refCommercial): static
    {
        $this->refCommercial = $refCommercial;

        return $this;
    }

    /**
     * @return Collection<int, Selectionne>
     */
    public function getSelectionnes(): Collection
    {
        return $this->selectionnes;
    }

    public function addSelectionne(Selectionne $selectionne): static
    {
        if (!$this->selectionnes->contains($selectionne)) {
            $this->selectionnes->add($selectionne);
            $selectionne->setRefClient($this);
        }

        return $this;
    }

    public function removeSelectionne(Selectionne $selectionne): static
    {
        if ($this->selectionnes->removeElement($selectionne)) {
            // set the owning side to null (unless already changed)
            if ($selectionne->getRefClient() === $this) {
                $selectionne->setRefClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setRefClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getRefClient() === $this) {
                $commande->setRefClient(null);
            }
        }

        return $this;
    }
}
