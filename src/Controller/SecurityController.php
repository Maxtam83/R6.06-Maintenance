<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * SecurityController handles user authentication, registration, and logout.
 */
class SecurityController extends AbstractController
{
    /**
     * Handles user login.
     *
     * @param AuthenticationUtils $authenticationUtils Handles authentication errors and last username retrieval.
     * @param UserRepository $userRepository Repository to fetch user data.
     * @param Request $request HTTP request object.
     *
     * @return Response Renders the login form with error messages if authentication fails.
     */
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils,
                          UserRepository $userRepository,
                          Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // Get authentication error if any
        $error = $authenticationUtils->getLastAuthenticationError();
        // Last entered username
        $lastUsername = $authenticationUtils->getLastUsername();

        // Check if the user exists before attempting authentication
        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $user = $userRepository->findOneBy(['username' => $username]);

            if (!$user) {
                $error = 'User not found. Please check your username.';
            }
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * Handles user logout.
     *
     * This method is intercepted by Symfony Security's firewall and never executed directly.
     *
     * @throws \LogicException Always throws an exception as it should never be reached.
     */
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * Handles user registration.
     *
     * @param Request $request HTTP request object.
     * @param Security $security Symfony Security service for user login.
     * @param UserPasswordHasherInterface $userPasswordHasher Password hasher for encoding passwords.
     * @param EntityManagerInterface $entityManager Doctrine entity manager for database operations.
     *
     * @return Response Renders the registration form or logs in the user after successful registration.
     */
    #[Route('/register', name: 'app_register')]
    public function register(Request $request,
                             Security $security,
                             UserPasswordHasherInterface $userPasswordHasher,
                             EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // Encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            // Set user role
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();

            // Log in the user automatically
            return $security->login($user, 'form_login', 'main');
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}