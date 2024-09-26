<?php

declare(strict_types=1);

namespace JdeShipping\Client\Client;

use Exception;
use JdeShipping\Exception\ClientException\ClientException;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{
	private const BASE_URL = 'https://api.jde.ru/vD/';
	private const BASE_TIMEOUT = 60;

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

	public function __construct()
	{
		$this->httpClient = HttpClient::create();
		$this->serializer = SerializerBuilder::create()->build();
	}

	public function setBaseUrl(string $baseUrl): void
	{
		$this->baseUrl = rtrim($baseUrl, '/');
	}

	public function setToken(string $token): void
	{
		$this->token = $token;
	}

	public function get(string $endpoint, array $params = [])
	{
		$this->checkBaseUrl();
		$url = $this->buildUrl($endpoint, $params);
		return $this->sendRequest('GET', $url);
	}

	public function post(string $endpoint, array $data = [])
	{
		$this->checkBaseUrl();
		$url = $this->buildUrl($endpoint);
		return $this->sendRequest('POST', $url, $data);
	}

	private function checkBaseUrl(): void
	{
		if ($this->baseUrl === null) {
			throw new ClientException('Base URL is not set');
		}
	}

	private function buildUrl(string $endpoint, array $params = []): string
	{
		$query = http_build_query($params);
		return $this->baseUrl . '/' . ltrim($endpoint, '/') . ($query ? '?' . $query : '');
	}

	private function sendRequest(string $method, string $url, array $data = [])
	{
		try {
			$options = [];
			if ($method === 'POST') {
				$options['json'] = $data;
			}
			if ($this->token) {
				$options['headers'] = [
					'Authorization' => 'Bearer ' . $this->token,
				];
			}
			$response = $this->httpClient->request($method, $url, $options);
			$content = $response->getContent();

			return $this->deserialize($content);
		} catch (Exception $e) {
			throw new ClientException($e->getMessage());
		}
	}

	private function deserialize(string $data, string $type = 'YourNamespace\DTO\TransportData')
	{
		return $this->serializer->deserialize($data, $type, 'json');
	}
}
