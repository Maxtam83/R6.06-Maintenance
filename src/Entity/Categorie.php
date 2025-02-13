<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Title = null;

    #[ORM\Column(length: 35)]
    private ?string $Libelle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateEnd = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Sexe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

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

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->DateStart;
    }

    public function setDateStart(\DateTimeInterface $DateStart): static
    {
        $this->DateStart = $DateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->DateEnd;
    }

    public function setDateEnd(\DateTimeInterface $DateEnd): static
    {
        $this->DateEnd = $DateEnd;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->Sexe;
    }

    public function setSexe(int $Sexe): static
    {
        $this->Sexe = $Sexe;

        return $this;
    }
}
