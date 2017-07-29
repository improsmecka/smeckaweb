<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FactionControllerTest extends WebTestCase
{
    public function testUzivatelA()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Uživatel A', $crawler->filter('.container h1')->text());
        
       
    }
}
