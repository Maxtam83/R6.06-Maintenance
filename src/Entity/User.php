<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User entity representing the application's users.
 *
 * This entity is used for authentication and authorization.
 * Each user has a unique email and username, a hashed password,
 * and an array of roles defining their permissions.
 *
 * @package App\Entity
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * Unique identifier for the user.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * The username of the user.
     *
     * @var string|null
     */
    #[ORM\Column(length: 180)]
    private ?string $username = null;

    /**
     * The roles assigned to the user.
     *
     * @var list<string>
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * The hashed password for authentication.
     *
     * @var string|null
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * The email address of the user (must be unique).
     *
     * @var string|null
     */
    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    /**
     * Get the user's unique identifier.
     *
     * @return int|null The user's ID.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the username of the user.
     *
     * @return string|null The username.
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the username of the user.
     *
     * @param string $username The username to set.
     * @return static Returns the instance for method chaining.
     */
    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     *
     * @return string The username as the identifier.
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * Get the roles assigned to the user.
     *
     * @return list<string> The user's roles.
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // Ensure every user has at least ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Set the roles assigned to the user.
     *
     * @param list<string> $roles The roles to set.
     * @return static Returns the instance for method chaining.
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * Get the hashed password of the user.
     *
     * @see PasswordAuthenticatedUserInterface
     *
     * @return string|null The hashed password.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the hashed password of the user.
     *
     * @param string $password The password to set.
     * @return static Returns the instance for method chaining.
     */
    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the email address of the user.
     *
     * @return string|null The user's email.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the email address of the user.
     *
     * @param string $email The email to set.
     * @return static Returns the instance for method chaining.
     */
    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Erase credentials that should not be persisted.
     *
     * This method is used to clear sensitive data (e.g., plain passwords) after authentication.
     *
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // Clear any temporary, sensitive data if needed.
        // Example: $this->plainPassword = null;
    }
}
