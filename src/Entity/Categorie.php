<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Représente une catégorie dans une compétition.
 *
 * Cette entité contient les informations relatives à une catégorie, telles que le titre,
 * le libellé, les dates de début et de fin, ainsi que le sexe (pour spécifier s'il s'agit d'une catégorie homme, femme, etc.).
 *
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
	/**
	 * @var int|null L'identifiant unique de la catégorie.
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column
	 */
	private ?int $id = null;

	/**
	 * @var string|null Le titre de la catégorie.
	 *
	 * @ORM\Column(length=10)
	 */
	#[ORM\Column(length: 10)]
	private ?string $Title = null;

	/**
	 * @var string|null Le libellé de la catégorie.
	 *
	 * @ORM\Column(length=35)
	 */
	#[ORM\Column(length: 35)]
	private ?string $Libelle = null;

	/**
	 * @var \DateTimeInterface La date de début de la catégorie.
	 *
	 * @ORM\Column(type=Types::DATE_MUTABLE)
	 */
	#[ORM\Column(type: Types::DATE_MUTABLE)]
	private ?\DateTimeInterface $DateStart = null;

	/**
	 * @var \DateTimeInterface La date de fin de la catégorie.
	 *
	 * @ORM\Column(type=Types::DATE_MUTABLE)
	 */
	#[ORM\Column(type: Types::DATE_MUTABLE)]
	private ?\DateTimeInterface $DateEnd = null;

	/**
	 * @var int|null Le sexe de la catégorie (par exemple, 1 pour homme, 2 pour femme).
	 *
	 * @ORM\Column(type=Types::SMALLINT)
	 */
	#[ORM\Column(type: Types::SMALLINT)]
	private ?int $Sexe = null;

	/**
	 * Récupère l'identifiant de la catégorie.
	 *
	 * @return int|null L'identifiant de la catégorie.
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * Récupère le titre de la catégorie.
	 *
	 * @return string|null Le titre de la catégorie.
	 */
	public function getTitle(): ?string
	{
		return $this->Title;
	}

	/**
	 * Définit le titre de la catégorie.
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
	 * Récupère le libellé de la catégorie.
	 *
	 * @return string|null Le libellé de la catégorie.
	 */
	public function getLibelle(): ?string
	{
		return $this->Libelle;
	}

	/**
	 * Définit le libellé de la catégorie.
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
	 * Récupère la date de début de la catégorie.
	 *
	 * @return \DateTimeInterface La date de début de la catégorie.
	 */
	public function getDateStart(): ?\DateTimeInterface
	{
		return $this->DateStart;
	}

	/**
	 * Définit la date de début de la catégorie.
	 *
	 * @param \DateTimeInterface $DateStart La date à attribuer.
	 * @return self
	 */
	public function setDateStart(\DateTimeInterface $DateStart): static
	{
		$this->DateStart = $DateStart;

		return $this;
	}

	/**
	 * Récupère la date de fin de la catégorie.
	 *
	 * @return \DateTimeInterface La date de fin de la catégorie.
	 */
	public function getDateEnd(): ?\DateTimeInterface
	{
		return $this->DateEnd;
	}

	/**
	 * Définit la date de fin de la catégorie.
	 *
	 * @param \DateTimeInterface $DateEnd La date à attribuer.
	 * @return self
	 */
	public function setDateEnd(\DateTimeInterface $DateEnd): static
	{
		$this->DateEnd = $DateEnd;

		return $this;
	}

	/**
	 * Récupère le sexe de la catégorie.
	 *
	 * @return int|null Le sexe de la catégorie (ex. 1 pour homme, 2 pour femme).
	 */
	public function getSexe(): ?int
	{
		return $this->Sexe;
	}

	/**
	 * Définit le sexe de la catégorie.
	 *
	 * @param int $Sexe Le sexe à attribuer (ex. 1 pour homme, 2 pour femme).
	 * @return self
	 */
	public function setSexe(int $Sexe): static
	{
		$this->Sexe = $Sexe;

		return $this;
	}
}
