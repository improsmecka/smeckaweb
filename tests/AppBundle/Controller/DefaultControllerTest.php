<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Improsmečka', $crawler->filter('.container h1')->text());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Uživatel")')->count()
        );        
    }
}
