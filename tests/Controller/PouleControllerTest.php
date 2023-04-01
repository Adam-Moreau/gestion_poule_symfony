<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PouleControllerTest extends WebTestCase
{
    // public function testIndex()
    // {
    //     $client = static::createClient();
    //     $client->request('GET', '/login');

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('p', 'Se conecter');
    // }

    public function testLoginSubmission()
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        $client->submitForm('login', [
            'username' => 'admoreau',
            'password' => 'chaloupe',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorTextContains('title', 'Poule');
    }

}