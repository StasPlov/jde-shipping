<?php

declare(strict_types=1);

namespace JdeShipping\Client;

use Exception;
use JdeShipping\Exception\ClientException;
use JdeShipping\Exception\RemoteServerException;
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

    private int $timeout = self::BASE_TIMEOUT;
    private string $url = self::BASE_URL;
    private ?string $token = null;
    private ?string $user = null;

    public function __construct(
        HttpClientInterface $httpClient = null,
        SerializerInterface $serializer = null
    ) {
        $this->httpClient = $httpClient ?? HttpClient::create();
        $this->serializer = $serializer ?? $this->createDefaultSerializer();
    }

    private function createDefaultSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new CamelCaseNamingStrategy())
            ->build();
    }

    public static function create(...$args): self
    {
        return new static(...$args);
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = rtrim($url, '/');
        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;
        return $this;
    }

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

    private function checkBaseSetting(): void
    {
        $this->checkUrl();
        $this->checkUser();
        $this->checkToken();
    }

    private function checkUrl(): void
    {
        if (empty($this->getUrl())) {
            throw new ClientException('Base URL is not set', 500);
        }
    }

    private function checkUser(): void
    {
        if ($this->getUser() === null) {
            throw new ClientException('User is not set', 500);
        }
    }

    private function checkToken(): void
    {
        if ($this->getToken() === null) {
            throw new ClientException('Token is not set', 500);
        }
    }

    private function buildUrl(string $endpoint, array $params = []): string
    {
        $query = http_build_query($params);
        return $this->url . '/' . ltrim($endpoint, '/') . ($query ? '?' . $query : '');
    }

    private function deserialize(string $data, string $type)
    {
        return $this->serializer->deserialize($data, $type, 'json');
    }

    private static function isJsonArray(string $jsonString): bool
    {
        $decoded = json_decode($jsonString, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RemoteServerException("Invalid JSON string", 500);
        }

        if (!is_array($decoded)) {
            throw new RemoteServerException("Invalid JSON string", 500);
        }

        return array_keys($decoded) === range(0, count($decoded) - 1);
    }

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

    private function isEmptyArrayResponse(string $result): bool
    {
        return json_decode($result, true) === [] && json_last_error() === JSON_ERROR_NONE;
    }

    private function getDeserializeType(string $result, string $deserializeType): string
    {
        return self::isJsonArray($result) ? "array<$deserializeType>" : $deserializeType;
    }
}
