<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * UserAuthenticator
 *
 * Handles user authentication using Symfony's security component.
 * Implements login form authentication with CSRF protection and remember-me functionality.
 *
 * @package App\Security
 */
class UserAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    /**
     * The login route name.
     *
     * @var string
     */
    public const LOGIN_ROUTE = 'app_login';

    /**
     * @var UrlGeneratorInterface Generates URLs for redirection.
     */
    private UrlGeneratorInterface $urlGenerator;

    /**
     * UserAuthenticator constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator The URL generator service.
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Authenticates the user based on the login request.
     *
     * This method retrieves the username and password from the request,
     * validates them, and applies security measures such as CSRF protection
     * and remember-me functionality.
     *
     * @param Request $request The HTTP request containing login credentials.
     *
     * @return Passport The security passport containing user credentials.
     */
    public function authenticate(Request $request): Passport
    {
        $username = $request->getPayload()->getString('username');

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $username);

        return new Passport(
            new UserBadge($username),
            new PasswordCredentials($request->getPayload()->getString('password')),
            [
                new CsrfTokenBadge('authenticate', $request->getPayload()->getString('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    /**
     * Handles the redirection after a successful authentication.
     *
     * If a target path was stored before authentication, the user is redirected there.
     * Otherwise, the user is redirected to the homepage.
     *
     * @param Request $request The HTTP request.
     * @param TokenInterface $token The authenticated security token.
     * @param string $firewallName The firewall name used during authentication.
     *
     * @return Response|null A redirect response or null if an error occurs.
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Redirect to home page after login
        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }

    /**
     * Returns the login URL for the authentication process.
     *
     * @param Request $request The HTTP request.
     *
     * @return string The login route URL.
     */
    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
