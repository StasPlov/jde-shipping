<?php

declare(strict_types=1);

namespace JdeShipping\Client;

use Exception;
use JdeShipping\Exception\ClientException;
use JdeShipping\Request\Request;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Класс Client для работы с API JDE Shipping
 */
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

	private int $timeout = self::BASE_TIMEOUT;
	private string $url = self::BASE_URL;
	private ?string $token = null;
	private ?string $user = null;

	/**
	 * Конструктор класса Client
	 *
	 * @param HttpClientInterface|null $httpClient HTTP клиент
	 * @param SerializerInterface|null $serializer Сериализатор
	 */
	public function __construct(
		HttpClientInterface $httpClient = null,
		SerializerInterface $serializer = null
	) {
		$this->httpClient = $httpClient ?? HttpClient::create();
		$this->serializer = $serializer ?? $this->createDefaultSerializer();
	}

	/**
	 * Создает сериализатор по умолчанию
	 *
	 * @return SerializerInterface
	 */
	private function createDefaultSerializer(): SerializerInterface
	{
		return SerializerBuilder::create()
			->setPropertyNamingStrategy(new CamelCaseNamingStrategy())
			->build();
	}

	/**
	 * Создает новый экземпляр класса Client
	 *
	 * @param mixed ...$args Аргументы для конструктора
	 * @return self
	 */
	public static function create(...$args): self
	{
		return new static(...$args);
	}

	/**
	 * Получает имя пользователя
	 *
	 * @return string|null
	 */
	public function getUser(): ?string
	{
		return $this->user;
	}

	/**
	 * Устанавливает имя пользователя
	 *
	 * @param string|null $user Имя пользователя
	 * @return self
	 */
	public function setUser(?string $user): self
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * Получает таймаут
	 *
	 * @return int
	 */
	public function getTimeout(): int
	{
		return $this->timeout;
	}

	/**
	 * Устанавливает таймаут
	 *
	 * @param int $timeout Таймаут в секундах
	 * @return self
	 */
	public function setTimeout(int $timeout): self
	{
		$this->timeout = $timeout;
		return $this;
	}

	/**
	 * Получает URL API
	 *
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * Устанавливает URL API
	 *
	 * @param string $url URL API
	 * @return self
	 */
	public function setUrl(string $url): self
	{
		$this->url = rtrim($url, '/');
		return $this;
	}

	/**
	 * Получает токен авторизации
	 *
	 * @return string|null
	 */
	public function getToken(): ?string
	{
		return $this->token;
	}

	/**
	 * Устанавливает токен авторизации
	 *
	 * @param string|null $token Токен авторизации
	 * @return self
	 */
	public function setToken(?string $token): self
	{
		$this->token = $token;
		return $this;
	}

	/**
	 * Выполняет запрос к API
	 *
	 * @param Request $request Объект запроса
	 * @return mixed
	 * @throws ClientException
	 */
	public function request(Request $request)
	{
		$this->checkBaseSetting();
		$data = $request->jsonSerialize();

		$params = $this->prepareRequestParams($request);
		$url = $this->buildUrl($request::URL, $params);
		$deserializeType = $request::DTO;

		$result = $this->send($url, $request::METHOD, $data);

		if ($this->isEmptyArrayResponse($result)) {
			return [];
		}

		$deserializeType = $this->getDeserializeType($result, $deserializeType);

		return $this->deserialize($result, $deserializeType);
	}

	/**
	 * Отправляет HTTP запрос
	 *
	 * @param string $url URL запроса
	 * @param string $method Метод запроса
	 * @param array $data Данные запроса
	 * @return string
	 * @throws ClientException
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
			return $response->getContent();
		} catch (Exception $e) {
			throw new ClientException($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * Проверяет базовые настройки клиента
	 *
	 * @throws ClientException
	 */
	private function checkBaseSetting(): void
	{
		$this->checkUrl();
		$this->checkUser();
		$this->checkToken();
	}

	/**
	 * Проверяет URL API
	 *
	 * @throws ClientException
	 */
	private function checkUrl(): void
	{
		if (empty($this->getUrl())) {
			throw new ClientException('Base URL is not set', 500);
		}
	}

	/**
	 * Проверяет имя пользователя
	 *
	 * @throws ClientException
	 */
	private function checkUser(): void
	{
		if ($this->getUser() === null) {
			throw new ClientException('User is not set', 500);
		}
	}

	/**
	 * Проверяет токен авторизации
	 *
	 * @throws ClientException
	 */
	private function checkToken(): void
	{
		if ($this->getToken() === null) {
			throw new ClientException('Token is not set', 500);
		}
	}

	/**
	 * Формирует URL запроса
	 *
	 * @param string $endpoint Конечная точка API
	 * @param array $params Параметры запроса
	 * @return string
	 */
	private function buildUrl(string $endpoint, array $params = []): string
	{
		$query = http_build_query($params);
		return $this->url . '/' . ltrim($endpoint, '/') . ($query ? '?' . $query : '');
	}

	/**
	 * Десериализует данные ответа
	 *
	 * @param string $data JSON строка
	 * @param string $type Тип объекта для десериализации
	 * @return mixed
	 */
	private function deserialize(string $data, string $type)
	{
		return $this->serializer->deserialize($data, $type, 'json');
	}

	/**
	 * Проверяет, является ли JSON строка массивом
	 *
	 * @param string $jsonString JSON строка
	 * @return bool
	 * @throws Exception
	 */
	private static function isJsonArray(string $jsonString): bool
	{
		$decoded = json_decode($jsonString, true);

		if (json_last_error() !== JSON_ERROR_NONE) {
			throw new Exception("Invalid JSON string", 500);
		}

		if (!is_array($decoded)) {
			throw new Exception("Invalid JSON string", 500);
		}

		return array_keys($decoded) === range(0, count($decoded) - 1);
	}

	/**
	 * Подготавливает параметры запроса
	 *
	 * @param Request $request Объект запроса
	 * @return array
	 */
	private function prepareRequestParams(Request $request): array
	{
		if (!$request::PRIVATE) {
			return [];
		}

		return [
			self::BASE_REQUIRE_USER => $this->getUser(),
			self::BASE_REQUIRE_TOKEN => $this->getToken(),
		];
	}

	/**
	 * Проверяет, является ли ответ пустым массивом
	 *
	 * @param string $result JSON строка
	 * @return bool
	 */
	private function isEmptyArrayResponse(string $result): bool
	{
		return json_decode($result, true) === [] && json_last_error() === JSON_ERROR_NONE;
	}

	/**
	 * Получает тип для десериализации
	 *
	 * @param string $result JSON строка
	 * @param string $deserializeType Тип для десериализации
	 * @return string
	 */
	private function getDeserializeType(string $result, string $deserializeType): string
	{
		return self::isJsonArray($result) ? "array<$deserializeType>" : $deserializeType;
	}
}
