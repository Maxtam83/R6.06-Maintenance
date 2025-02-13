<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpreuveRepository::class)]
class Epreuve
{
	/**
	 * Identifiant unique de l'épreuve.
	 *
	 * @var int|null
	 */
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private ?int $id = null;

	/**
	 * Libellé court de l'épreuve (abréviation).
	 *
	 * @var string|null
	 */
	#[ORM\Column(length: 15, nullable: false)]
	private ?string $LibelCourt = null;

	/**
	 * Libellé complet de l'épreuve.
	 *
	 * @var string|null
	 */
	#[ORM\Column(length: 75, nullable: false)]
	private ?string $Libelle = null;

	/**
	 * Récupère l'identifiant de l'épreuve.
	 *
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * Récupère le libellé court de l'épreuve.
	 *
	 * @return string|null
	 */
	public function getLibelCourt(): ?string
	{
		return $this->LibelCourt;
	}

	/**
	 * Définit le libellé court de l'épreuve.
	 *
	 * @param string $LibelCourt
	 * @return self
	 */
	public function setLibelCourt(string $LibelCourt): static
	{
		$this->LibelCourt = $LibelCourt;
		return $this;
	}

	/**
	 * Récupère le libellé complet de l'épreuve.
	 *
	 * @return string|null
	 */
	public function getLibelle(): ?string
	{
		return $this->Libelle;
	}

	/**
	 * Définit le libellé complet de l'épreuve.
	 *
	 * @param string $Libelle
	 * @return self
	 */
	public function setLibelle(string $Libelle): static
	{
		$this->Libelle = $Libelle;
		return $this;
	}
}
