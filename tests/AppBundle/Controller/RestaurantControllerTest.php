<?php


namespace Tests\AppBundle\Controller;


use function dump;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestaurantControllerTest extends WebTestCase
{

    public function testIndexLoggedInAsAnonymous()
    {
        $client = static::createClient();
        $client->request('GET', '/api/restaurant');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }

//    public function testFilterLoggedInAsAnonymous()
//    {
//        $client = static::createClient();
//        $filter = base64_encode('[{"type": "eq", "property": "title", "value": "Test restaurant 1"}]');
//        $response = $client->request('GET', '/api/restaurant/filter?filter=' . $filter);
//        $this->assertEquals('Test restaurant 1', $this->getResponseData($response)['content'][0]['title']);
//        $this->assertJsonResponse($response, 200);
//    }
//
    public function testCreateLoggedInAsAnonymous()
    {
        $client = static::createClient();
        $client->request('restaurant', '/api/restaurant', [
            'restaurant' => [
                'title' => 'test',
                'url' => 'test',
                'content' => 'test',
                'source' => 'test',
                'published_at' => '01-01-2000 00:00:00'
            ]
        ]);
        $this->assertJsonResponse($response, 200);
        $this->assertEquals('test', $this->getResponseData($response)['title']);
        $this->assertContainsKeys($response);
    }
//
//
//
//    public function testEditrestaurantLoggedInAsAnonymous()
//    {
//        $client = static::createClient();
//        $response = $client->request('PUT', '/api/restaurant/1', [
//            'restaurant' => [
//                'title' => 'test2',
//                'url' => 'http://test2.com',
//                'content' => 'test',
//                'source' => 'test',
//                'published_at' => '01-01-2001 00:00:00'
//            ]
//        ]);
//        $this->assertJsonResponse($response, 200);
//        $this->assertContainsKeys($response);
//        $this->assertEquals('test2', $this->getResponseData($response)['title']);
//    }
//
//    public function testDeleterestaurantLoggedInAsAnonymous()
//    {
//        $client = static::createClient();
//        $response = $client->request('DELETE', '/api/restaurant/1');
//        $this->assertEquals(204, $response->getStatusCode());
//    }
//
//    public function getModelKeys()
//    {
//        return ['title', 'url', 'content', 'source', 'published_at'];
//    }

}