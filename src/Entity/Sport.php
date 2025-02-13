<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportRepository::class)]
class Sport
{
	/**
	 * Identifiant unique du sport.
	 *
	 * @var int|null
	 */
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private ?int $id = null;

	/**
	 * Titre du sport (abréviation ou nom court).
	 *
	 * @var string|null
	 */
	#[ORM\Column(length: 20)]
	private ?string $Title = null;

	/**
	 * Libellé complet du sport.
	 *
	 * @var string|null
	 */
	#[ORM\Column(length: 50)]
	private ?string $Libelle = null;

	/**
	 * Récupère l'identifiant du sport.
	 *
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * Récupère le titre du sport.
	 *
	 * @return string|null
	 */
	public function getTitle(): ?string
	{
		return $this->Title;
	}

	/**
	 * Définit le titre du sport.
	 *
	 * @param string $Title
	 * @return self
	 */
	public function setTitle(string $Title): static
	{
		$this->Title = $Title;
		return $this;
	}

	/**
	 * Récupère le libellé du sport.
	 *
	 * @return string|null
	 */
	public function getLibelle(): ?string
	{
		return $this->Libelle;
	}

	/**
	 * Définit le libellé du sport.
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
