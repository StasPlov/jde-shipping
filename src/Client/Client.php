<?php

declare(strict_types=1);

namespace JdeShipping\Client;

use Exception;
use JdeShipping\Exception\ClientException;
use JdeShipping\Exception\RemoteServerException;
use JdeShipping\Request\Order\OrderCreateRequest;
use JdeShipping\Request\Request;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
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
	 * @var int
	 */
	private int $timeout = self::BASE_TIMEOUT;

	/**
	 * @var string
	 */
	private string $url = self::BASE_URL;

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
		$this->serializer = $serializer ?? SerializerBuilder::create()
			->setPropertyNamingStrategy(new CamelCaseNamingStrategy())
			->build();
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
	 * Get the value of timeout
	 *
	 * @return int
	 */
	public function getTimeout(): int
	{
		return $this->timeout;
	}

	/**
	 * Set the value of timeout
	 *
	 * @param int  $timeout  
	 *
	 * @return self
	 */
	public function setTimeout(int $timeout): self
	{
		$this->timeout = $timeout;

		return $this;
	}

	/**
	 * Get the value of Url
	 *
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * Set the value of url
	 *
	 * @param string $url  
	 *
	 * @return self
	 */
	public function setUrl(string $url): self
	{
		$this->url = rtrim($url, '/');
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
		$data = $request->jsonSerialize();

		/* if ($request instanceof OrderCreateRequest) {
			var_dump($data);
			die;
		} */

		$params = [];

		if ($request::PRIVATE) {
			if ($request::METHOD === self::METHOD_GET) {
				$data[self::BASE_REQUIRE_USER] = $this->getUser();
				$data[self::BASE_REQUIRE_TOKEN] = $this->getToken();
			} else { // if POST
				$params[self::BASE_REQUIRE_USER] = $this->getUser();
				$params[self::BASE_REQUIRE_TOKEN] = $this->getToken();
			}
		}

		$url = $this->buildUrl($request::URL, $params);
		$deserializeType = $request::DTO;

		$result = $this->send(
			$url,
			$request::METHOD,
			$data
		);

		// if empty array response
		if (json_decode($result, true) === [] && json_last_error() === JSON_ERROR_NONE) {
			return [];
		}

		if (self::isJsonArray($result)) {
			$deserializeType = "array<$deserializeType>";
		}

		$resultObj = $this->deserialize(
			$result,
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
	 * @return string json
	 */
	private function send(string $url, string $method = self::METHOD_POST, array $data = []): string
	{
		try {
			$sendType = ($method === self::METHOD_POST) ? 'json' : 'query';

			$options = [
				$sendType => $data,
				'timeout' => $this->timeout
			];

			$response = $this->httpClient->request($method, $url, $options);
			$result = $response->getContent();
		} catch (Exception $e) {

			/* print_r($response);
			die; */
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
		$this->checkUrl();
		$this->checkUser();
		$this->checkToken();
	}

	/**
	 * Check base url function
	 *
	 * @return void
	 * @throws ClientException
	 */
	private function checkUrl(): void
	{
		if (empty($this->getUrl())) {
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
		return $this->url . '/' . ltrim($endpoint, '/') . ($query ? '?' . $query : '');
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

	/**
	 * Check is json array string or json simple object string function
	 *
	 * @param string $jsonString
	 * @return bool
	 * @throws RemoteServerException
	 */
	private static function isJsonArray(string $jsonString): bool
	{
		$decoded = json_decode($jsonString, true);

		if (json_last_error() !== JSON_ERROR_NONE) {
			throw new RemoteServerException("Invalid JSON string", 500);
		}

		if (is_array($decoded)) {
			if (array_keys($decoded) !== range(0, count($decoded) - 1)) {
				return false;
			} else {
				return true;
			}
		} else {
			throw new RemoteServerException("Invalid JSON string", 500);
		}
	}
}
