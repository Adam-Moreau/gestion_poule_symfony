<?php

namespace App\Entity;

use App\Repository\CouvaisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouvaisonRepository::class)]
class Couvaison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFinCouv = null;

    #[ORM\Column]
    private ?int $nbrOeufDebut = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrOeufPerdu = null;

    #[ORM\Column]
    private ?bool $etatCouv = null;

    #[ORM\OneToOne(mappedBy: 'couvaison', cascade: ['persist', 'remove'])]
    private ?Poule $poule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFinCouv(): ?\DateTimeInterface
    {
        return $this->dateFinCouv;
    }

    public function setDateFinCouv(?\DateTimeInterface $dateFinCouv): self
    {
        $this->dateFinCouv = $dateFinCouv;

        return $this;
    }

    public function getNbrOeufDebut(): ?int
    {
        return $this->nbrOeufDebut;
    }

    public function setNbrOeufDebut(int $nbrOeufDebut): self
    {
        $this->nbrOeufDebut = $nbrOeufDebut;

        return $this;
    }

    public function getNbrOeufPerdu(): ?int
    {
        return $this->nbrOeufPerdu;
    }

    public function setNbrOeufPerdu(?int $nbrOeufPerdu): self
    {
        $this->nbrOeufPerdu = $nbrOeufPerdu;

        return $this;
    }

    public function isEtatCouv(): ?bool
    {
        return $this->etatCouv;
    }

    public function setEtatCouv(bool $etatCouv): self
    {
        $this->etatCouv = $etatCouv;

        return $this;
    }

    public function getPoule(): ?Poule
    {
        return $this->poule;
    }

    public function setPoule(?Poule $poule): self
    {
        // unset the owning side of the relation if necessary
        if ($poule === null && $this->poule !== null) {
            $this->poule->setCouvaison(null);
        }

        // set the owning side of the relation if necessary
        if ($poule !== null && $poule->getCouvaison() !== $this) {
            $poule->setCouvaison($this);
        }

        $this->poule = $poule;

        return $this;
    }
}
