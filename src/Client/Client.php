<?php

declare(strict_types=1);

namespace JdeShipping\Client;

use Exception;
use JdeShipping\Exception\ClientException;
use JdeShipping\Request\Request;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client implements ClientInterface
{
	private const BASE_URL = 'https://api.jde.ru/vD';
	private const BASE_TIMEOUT = 60;
	private const BASE_REQUIRE_USER = 'user';
	private const BASE_REQUIRE_TOKEN = 'token';

	const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';

	private HttpClientInterface $httpClient;
	private SerializerInterface $serializer;

	/**
	 * @var string
	 */
	private string $baseUrl = self::BASE_URL;

	/**
	 * @var string|null
	 */
	private ?string $token = null;

	/**
	 * @var string|null
	 */
	private ?string $user = null;

	public function __construct(HttpClientInterface $httpClient = null, SerializerInterface $serializer = null)
	{
		$this->httpClient = $httpClient ?? HttpClient::create();
		$this->serializer = $serializer ?? SerializerBuilder::create()->build();
	}

	/**
	 * @param mixed ...$args
	 *
	 * @return ClientInterface
	 */
	public static function create(...$args): self
	{
		return new static(...$args);
	}

	/**
	 * Get the value of user
	 *
	 * @return string|null
	 */
	public function getUser(): ?string
	{
		return $this->user;
	}

	/**
	 * Set the value of user
	 *
	 * @param string|null  $user  
	 *
	 * @return self
	 */
	public function setUser(?string $user): self
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * Get the value of baseUrl
	 *
	 * @return string
	 */
	public function getBaseUrl(): string
	{
		return $this->baseUrl;
	}

	/**
	 * Set the value of baseUrl
	 *
	 * @param string $baseUrl  
	 *
	 * @return self
	 */
	public function setBaseUrl(string $baseUrl): self
	{
		$this->baseUrl = rtrim($baseUrl, '/');
		return $this;
	}

	/**
	 * Get the value of token
	 *
	 * @return string|null
	 */
	public function getToken(): ?string
	{
		return $this->token;
	}

	/**
	 * Set the value of token
	 *
	 * @param string|null  $token  
	 *
	 * @return self
	 */
	public function setToken(?string $token): self
	{
		$this->token = $token;
		return $this;
	}

	public function request(Request $request)
	{
		$this->checkBaseSetting();

		$url = $this->buildUrl($request::URL);
		$data = $request->jsonSerialize();

		if ($request::PRIVATE) {
			$data[self::BASE_REQUIRE_USER] = $this->getUser();
			$data[self::BASE_REQUIRE_TOKEN] = $this->getToken();
		}

		$deserializeType = $request::DTO;

		$result = $this->send(
			$url,
			$request::METHOD,
			$data
		);

		if (is_array($result)) {
			$deserializeType = "array<$deserializeType>";
		}

		$resultObj = $this->deserialize(
			json_encode($result),
			$deserializeType
		);

		return $resultObj;
	}

	/**
	 * Send to API function
	 *
	 * @param string $url
	 * @param string $method
	 * @param array $data
	 * 
	 * @return array
	 */
	private function send(string $url, string $method = self::METHOD_POST, array $data = []): array
	{
		try {
			$sendType = ($method === self::METHOD_POST) ? 'json' : 'query';

			$options = [
				$sendType => $data,
				'timeout' => self::BASE_TIMEOUT
			];

			$response = $this->httpClient->request($method, $url, $options);
			$result = $response->toArray();
		} catch (Exception $e) {
			throw new ClientException($e->getMessage(), $e->getCode());
		} finally {
			return $result;
		}
	}

	/**
	 * Check base url function
	 *
	 * @return void
	 * @throws ClientException
	 */
	private function checkBaseSetting(): void
	{
		$this->checkBaseUrl();
		$this->checkUser();
		$this->checkToken();
	}

	/**
	 * Check base url function
	 *
	 * @return void
	 * @throws ClientException
	 */
	private function checkBaseUrl(): void
	{
		if (empty($this->getBaseUrl())) {
			throw new ClientException('Base URL is not set', 500);
		}
	}

	/**
	 * Check base user function
	 *
	 * @return void
	 * @throws ClientException
	 */
	private function checkUser(): void
	{
		if ($this->getUser() === null) {
			throw new ClientException('User is not set', 500);
		}
	}

	/**
	 * Check base user function
	 *
	 * @return void
	 * @throws ClientException
	 */
	private function checkToken(): void
	{
		if ($this->getToken() === null) {
			throw new ClientException('Token is not set', 500);
		}
	}

	/**
	 * Build url function
	 *
	 * @param string $endpoint
	 * @param array $params
	 * 
	 * @return string
	 */
	private function buildUrl(string $endpoint, array $params = []): string
	{
		$query = http_build_query($params);
		return $this->baseUrl . '/' . ltrim($endpoint, '/') . ($query ? '?' . $query : '');
	}

	/**
	 * Deserialize data function
	 *
	 * @param string $data
	 * @param string|class-string $type
	 * 
	 * @return object|array<object>
	 */
	private function deserialize(string $data, string $type)
	{
		return $this->serializer->deserialize($data, $type, 'json');
	}
}
