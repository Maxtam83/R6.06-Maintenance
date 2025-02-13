<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * UserRepository
 *
 * This repository manages database interactions for the User entity.
 * It provides methods to retrieve and manipulate user data.
 *
 * @extends ServiceEntityRepository<User>
 * @implements PasswordUpgraderInterface
 *
 * @package App\Repository
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    /**
     * UserRepository constructor.
     *
     * @param ManagerRegistry $registry The registry manager for Doctrine entities.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Upgrades (rehashes) the user's password automatically over time.
     *
     * This method is used to ensure that passwords are always stored using the most secure algorithm.
     *
     * @param PasswordAuthenticatedUserInterface $user The user whose password needs to be upgraded.
     * @param string $newHashedPassword The new hashed password.
     *
     * @throws UnsupportedUserException If the provided user is not an instance of User.
     *
     * @return void
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}
