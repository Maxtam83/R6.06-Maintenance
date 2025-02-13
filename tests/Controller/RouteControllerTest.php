<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * RouteControllerTest
 *
 * This class contains functional tests for the RouteController.
 * It ensures that the defined routes return the expected responses.
 *
 * @package App\Tests\Controller
 */
final class RouteControllerTest extends WebTestCase
{
    /**
     * Tests the accessibility of the home page.
     *
     * This test sends a GET request to "/home" and verifies that
     * the response is successful (HTTP 200).
     *
     * @return void
     */
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/home');

        self::assertResponseIsSuccessful();
    }
}
