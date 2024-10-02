<?php

declare(strict_types=1);

namespace JdeShipping\Client;

use JdeShipping\Exception\ClientException;
use JdeShipping\Request\Request;

interface ClientInterface
{
	/**
	 * @param string $token
	 * @return self
	 */
	public function setUser(string $token): self;

	/**
	 * @param string $token
	 * @return self
	 */
	public function setToken(string $token): self;

	/**
	 * @param string $token
	 * @return self
	 */
	public function setBaseUrl(string $baseUrl): self;

	/**
	 * @param Request $request
	 * @return object|array<object>
	 * 
	 * @throws ClientException
	 */
	public function request(Request $request);
}
