<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserFixtures
 *
 * This class is responsible for loading initial user data into the database.
 * It creates an administrator and several regular users.
 *
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface The password hasher service for securing user passwords.
     */
    private UserPasswordHasherInterface $userPasswordHasher;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordHasherInterface $userPasswordHasher The password hasher service.
     */
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    /**
     * Loads initial user data into the database.
     *
     * This method creates:
     * - One administrator account
     * - Three regular user accounts
     *
     * @param ObjectManager $manager The Doctrine object manager.
     */
    public function load(ObjectManager $manager): void
    {
        // Create an administrator user
        $admin = new User();
        $admin->setEmail('admin@ugselweb.org');
        $admin->setUsername('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordHasher->hashPassword($admin, 'admin'));
        $manager->persist($admin);

        // Create several professor users
        for ($i = 1; $i <= 3; $i++) {
            $user = new User();
            $user->setEmail("prof$i@ugselweb.org");
            $user->setUsername("prof$i");
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
            $manager->persist($user);
        }

        // Save all users to the database
        $manager->flush();
    }
}
