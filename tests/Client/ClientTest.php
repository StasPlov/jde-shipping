<?php

namespace Tests\JdeShipping\Client;

use JdeShipping\Client\Client;
use JdeShipping\Exception\ClientException;
use JdeShipping\Request\Request;
use PHPUnit\Framework\TestCase;
use stdClass;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use JMS\Serializer\Annotation as JMS;

class ClientTest extends TestCase
{
	private Client $client;

	protected function setUp(): void
	{
		$this->client = new Client();
	}

	public function testSetAndGetUser(): void
	{
		$user = 'testUser';
		$this->client->setUser($user);
		$this->assertEquals($user, $this->client->getUser());
	}

	public function testSetAndGetToken(): void
	{
		$token = 'testToken';
		$this->client->setToken($token);
		$this->assertEquals($token, $this->client->getToken());
	}

	public function testSetAndGetTimeout(): void
	{
		$timeout = 120;
		$this->client->setTimeout($timeout);
		$this->assertEquals($timeout, $this->client->getTimeout());
	}

	public function testSetAndGetUrl(): void
	{
		$url = 'https://api.test.com';
		$this->client->setUrl($url);
		$this->assertEquals($url, $this->client->getUrl());
	}

	public function testRequestThrowsExceptionWhenUserNotSet(): void
	{
		$this->expectException(ClientException::class);
		$this->expectExceptionMessage('User is not set');

		$request = $this->createMock(TestRequest::class);
		$this->client->setToken('token')->request($request);
	}

	public function testRequestThrowsExceptionWhenTokenNotSet(): void
	{
		$this->expectException(ClientException::class);
		$this->expectExceptionMessage('Token is not set');

		$request = $this->createMock(TestRequest::class);
		$this->client->setUser('user')->request($request);
	}

	public function testRequestSuccess(): void
	{
		// Создаем MockHttpClient с ожидаемым ответом
		$mockResponse = new MockResponse('{"key": "test response value"}');
		$mockHttpClient = new MockHttpClient([$mockResponse]);

		$client = (new Client($mockHttpClient))
			->setUser('user')
			->setToken('token')
			->setUrl('https://api.test.com');

		$request = $this->createMock(TestRequest::class);

		/** @var TestDto $result */
		$result = $client->request($request);

		$this->assertInstanceOf(TestDto::class, $result);
		$this->assertEquals('test response value', $result->key);
		$this->assertEquals(1, $mockHttpClient->getRequestsCount());
	}

	public function testRequestWithEmptyArrayResponse(): void
	{
		$mockResponse = new MockResponse('[]');
		$mockHttpClient = new MockHttpClient($mockResponse);

		$client = new Client($mockHttpClient);
		$client->setUser('user')->setToken('token')->setUrl('https://api.test.com');

		$request = $this->createMock(TestRequest::class);

		$result = $client->request($request);

		$this->assertIsArray($result);
		$this->assertEmpty($result);
	}
}


class TestRequest extends Request
{
	const URL = '/test';
	const METHOD = 'GET';
	const DTO = TestDto::class;
	const PRIVATE = true;
}

class TestDto extends stdClass
{	
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	public string $key;
}