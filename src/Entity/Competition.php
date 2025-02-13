<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Représente une compétition.
 *
 * Cette entité contient les informations relatives à une compétition, telles que le titre,
 * le libellé, les dates de début et de fin, ainsi que la localisation.
 *
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
	/**
	 * @var int|null L'identifiant unique de la compétition.
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column
	 */
	private ?int $id = null;

	/**
	 * @var string|null Le titre de la compétition.
	 *
	 * @ORM\Column(length=10)
	 */
	#[ORM\Column(length: 10)]
	private ?string $Title = null;

	/**
	 * @var string|null Le libellé de la compétition.
	 *
	 * @ORM\Column(length=50)
	 */
	#[ORM\Column(length: 50)]
	private ?string $Libelle = null;

	/**
	 * @var \DateTimeInterface|null La date de début de la compétition.
	 *
	 * @ORM\Column(type=Types::DATE_MUTABLE, nullable=true)
	 */
	#[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
	private ?\DateTimeInterface $DateStart = null;

	/**
	 * @var \DateTimeInterface|null La date de fin de la compétition.
	 *
	 * @ORM\Column(type=Types::DATE_MUTABLE, nullable=true)
	 */
	#[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
	private ?\DateTimeInterface $DateEnd = null;

	/**
	 * @var string|null La localisation de la compétition.
	 *
	 * @ORM\Column(length=25, nullable=true)
	 */
	#[ORM\Column(length: 25, nullable: true)]
	private ?string $Localisation = null;

	/**
	 * Récupère l'identifiant de la compétition.
	 *
	 * @return int|null L'identifiant de la compétition.
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * Récupère le titre de la compétition.
	 *
	 * @return string|null Le titre de la compétition.
	 */
	public function getTitle(): ?string
	{
		return $this->Title;
	}

	/**
	 * Définit le titre de la compétition.
	 *
	 * @param string $Title Le titre à attribuer.
	 * @return self
	 */
	public function setTitle(string $Title): static
	{
		$this->Title = $Title;

		return $this;
	}

	/**
	 * Récupère le libellé de la compétition.
	 *
	 * @return string|null Le libellé de la compétition.
	 */
	public function getLibelle(): ?string
	{
		return $this->Libelle;
	}

	/**
	 * Définit le libellé de la compétition.
	 *
	 * @param string $Libelle Le libellé à attribuer.
	 * @return self
	 */
	public function setLibelle(string $Libelle): static
	{
		$this->Libelle = $Libelle;

		return $this;
	}

	/**
	 * Récupère la date de début de la compétition.
	 *
	 * @return \DateTimeInterface|null La date de début de la compétition.
	 */
	public function getDateStart(): ?\DateTimeInterface
	{
		return $this->DateStart;
	}

	/**
	 * Définit la date de début de la compétition.
	 *
	 * @param \DateTimeInterface|null $DateStart La date à attribuer.
	 * @return self
	 */
	public function setDateStart(?\DateTimeInterface $DateStart): static
	{
		$this->DateStart = $DateStart;

		return $this;
	}

	/**
	 * Récupère la date de fin de la compétition.
	 *
	 * @return \DateTimeInterface|null La date de fin de la compétition.
	 */
	public function getDateEnd(): ?\DateTimeInterface
	{
		return $this->DateEnd;
	}

	/**
	 * Définit la date de fin de la compétition.
	 *
	 * @param \DateTimeInterface|null $DateEnd La date à attribuer.
	 * @return self
	 */
	public function setDateEnd(?\DateTimeInterface $DateEnd): static
	{
		$this->DateEnd = $DateEnd;

		return $this;
	}

	/**
	 * Récupère la localisation de la compétition.
	 *
	 * @return string|null La localisation de la compétition.
	 */
	public function getLocalisation(): ?string
	{
		return $this->Localisation;
	}

	/**
	 * Définit la localisation de la compétition.
	 *
	 * @param string|null $Localisation La localisation à attribuer.
	 * @return self
	 */
	public function setLocalisation(?string $Localisation): static
	{
		$this->Localisation = $Localisation;

		return $this;
	}
}
