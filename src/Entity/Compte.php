<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
* @ApiResource(
 * normalizationContext={"groups"={"test:read"}},
 * collectionOperations={"get"})
 * @ApiFilter(SearchFilter::class, properties={"numcompte": "exact"})
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"test:read"})

     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Typecompte", inversedBy="comptes")
     * @Groups({"test:read"})
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="comptes")
     * @Groups({"test:read"})
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"test:read"})
     */
    private $numcompte;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"test:read"})
     */
    private $clerib;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $fraiouverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $agio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateouverture;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $solde;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Operation", mappedBy="compte")
     * @Groups({"test:read"})
     */
    private $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompte(): ?Typecompte
    {
        return $this->compte;
    }

    public function setCompte(?Typecompte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getNumcompte(): ?string
    {
        return $this->numcompte;
    }

    public function setNumcompte(?string $numcompte): self
    {
        $this->numcompte = $numcompte;

        return $this;
    }

    public function getClerib(): ?string
    {
        return $this->clerib;
    }

    public function setClerib(string $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getFraiouverture(): ?string
    {
        return $this->fraiouverture;
    }

    public function setFraiouverture(string $fraiouverture): self
    {
        $this->fraiouverture = $fraiouverture;

        return $this;
    }

    public function getAgio(): ?string
    {
        return $this->agio;
    }

    public function setAgio(string $agio): self
    {
        $this->agio = $agio;

        return $this;
    }

    public function getDateouverture(): ?string
    {
        return $this->dateouverture;
    }

    public function setDateouverture(string $dateouverture): self
    {
        $this->dateouverture = $dateouverture;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setCompte($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCompte() === $this) {
                $operation->setCompte(null);
            }
        }

        return $this;
    }
}
