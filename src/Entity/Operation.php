<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Typeoperation", inversedBy="operations")
     */
    private $typeoperation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="operations")
     */
    private $compte;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateoperation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeoperation(): ?Typeoperation
    {
        return $this->typeoperation;
    }

    public function setTypeoperation(?Typeoperation $typeoperation): self
    {
        $this->typeoperation = $typeoperation;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateoperation(): ?string
    {
        return $this->dateoperation;
    }

    public function setDateoperation(string $dateoperation): self
    {
        $this->dateoperation = $dateoperation;

        return $this;
    }
}
