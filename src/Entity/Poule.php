<?php

namespace App\Entity;

use App\Repository\PouleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PouleRepository::class)]
class Poule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]



    private ?int $id = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $nom_poule = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $sexe_poule = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $photo_poule = null;

    #[ORM\Column(length: 20)]
    private ?string $race_poule = null;

    #[ORM\Column(length: 25)]
    private ?string $colori_poule = null;

    #[ORM\Column]
    private ?bool $bague_poule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire_poule = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_eclo = null;

    #[ORM\ManyToOne(inversedBy: 'poules')]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPoule(): ?string
    {
        return $this->nom_poule;
    }

    public function setNomPoule(?string $nom_poule): self
    {
        $this->nom_poule = $nom_poule;

        return $this;
    }

    public function getSexePoule(): ?string
    {
        return $this->sexe_poule;
    }

    public function setSexePoule(?string $sexe_poule): self
    {
        $this->sexe_poule = $sexe_poule;

        return $this;
    }

    public function getPhotoPoule(): ?string
    {
        return $this->photo_poule;
    }

    public function setPhotoPoule(?string $photo_poule): self
    {
        $this->photo_poule = $photo_poule;

        return $this;
    }

    public function getRacePoule(): ?string
    {
        return $this->race_poule;
    }

    public function setRacePoule(string $race_poule): self
    {
        $this->race_poule = $race_poule;

        return $this;
    }

    public function getColoriPoule(): ?string
    {
        return $this->colori_poule;
    }

    public function setColoriPoule(string $colori_poule): self
    {
        $this->colori_poule = $colori_poule;

        return $this;
    }

    public function isBaguePoule(): ?bool
    {
        return $this->bague_poule;
    }

    public function setBaguePoule(bool $bague_poule): self
    {
        $this->bague_poule = $bague_poule;

        return $this;
    }

    public function getCommentairePoule(): ?string
    {
        return $this->commentaire_poule;
    }

    public function setCommentairePoule(?string $commentaire_poule): self
    {
        $this->commentaire_poule = $commentaire_poule;

        return $this;
    }

    public function getDateEclo(): ?\DateTimeInterface
    {
        return $this->date_eclo;
    }

    public function setDateEclo(?\DateTimeInterface $date_eclo): self
    {
        $this->date_eclo = $date_eclo;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
