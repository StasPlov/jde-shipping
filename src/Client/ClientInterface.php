<?php

declare(strict_types=1);

namespace JdeShipping\Client\Client;

interface ClientInterface
{
	public function setBaseUrl(string $baseUrl): self;

	public function setToken(string $token): self;

	public function get(string $endpoint, array $params = []);

	public function post(string $endpoint, array $data = []);
}
