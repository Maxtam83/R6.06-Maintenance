<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class RouteController
 *
 * This controller handles the rendering of various static pages in the application.
 * It ensures proper routing for pages that do not require dynamic content processing.
 *
 * @package App\Controller
 */
final class RouteController extends AbstractController
{
    /**
     * Displays the home page.
     *
     * Redirects to login if the user is not authenticated.
     *
     * @return Response Renders the homepage template or redirects to login.
     */
    #[Route(path: '/home', name: 'app_home')]
    public function home(): Response
    {
        // Redirect to login page if the user is not authenticated
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('base.html.twig');
    }
}
