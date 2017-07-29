<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testUzivatelA()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/u/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Uživatel A', $crawler->filter('.container h1')->text());
        
       
    }
}
