<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpreuveRepository::class)]
class Epreuve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $LibelCourt = null;

    #[ORM\Column(length: 75)]
    private ?string $Libelle = null;

    #[ORM\Column(nullable: true)]
    private ?int $Ordre = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Sys = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelCourt(): ?string
    {
        return $this->LibelCourt;
    }

    public function setLibelCourt(string $LibelCourt): static
    {
        $this->LibelCourt = $LibelCourt;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): static
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->Ordre;
    }

    public function setOrdre(?int $Ordre): static
    {
        $this->Ordre = $Ordre;

        return $this;
    }

    public function getSys(): ?int
    {
        return $this->Sys;
    }

    public function setSys(?int $Sys): static
    {
        $this->Sys = $Sys;

        return $this;
    }
}
