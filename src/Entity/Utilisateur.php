<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom_util = null;

    #[ORM\Column(length: 30)]
    private ?string $mail_util = null;

    #[ORM\Column(length: 40)]
    private ?string $mdp_util = null;

    #[ORM\Column]
    private ?bool $activ_util = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Poule::class)]
    private Collection $poules;

    public function __construct()
    {
        $this->poules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtil(): ?string
    {
        return $this->nom_util;
    }

    public function setNomUtil(string $nom_util): self
    {
        $this->nom_util = $nom_util;

        return $this;
    }

    public function getMailUtil(): ?string
    {
        return $this->mail_util;
    }

    public function setMailUtil(string $mail_util): self
    {
        $this->mail_util = $mail_util;

        return $this;
    }

    public function getMdpUtil(): ?string
    {
        return $this->mdp_util;
    }

    public function setMdpUtil(string $mdp_util): self
    {
        $this->mdp_util = $mdp_util;

        return $this;
    }

    public function isActivUtil(): ?bool
    {
        return $this->activ_util;
    }

    public function setActivUtil(bool $activ_util): self
    {
        $this->activ_util = $activ_util;

        return $this;
    }

    /**
     * @return Collection<int, Poule>
     */
    public function getPoules(): Collection
    {
        return $this->poules;
    }

    public function addPoule(Poule $poule): self
    {
        if (!$this->poules->contains($poule)) {
            $this->poules->add($poule);
            $poule->setUtilisateur($this);
        }

        return $this;
    }

    public function removePoule(Poule $poule): self
    {
        if ($this->poules->removeElement($poule)) {
            // set the owning side to null (unless already changed)
            if ($poule->getUtilisateur() === $this) {
                $poule->setUtilisateur(null);
            }
        }

        return $this;
    }
}
