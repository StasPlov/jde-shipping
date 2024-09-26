<?php

declare(strict_types=1);

namespace Tests\JdeShipping;

class ClientTest
{
	/** @return Client */
	public function newClient(ClientInterface $http = null)
	{
		$builder = new ClientBuilder();
		$builder->setGuzzleClient($http ?? $this->getHttpClient());

		return $builder->build();
	}

	public function errorResponsesProvider(): iterable
	{
		yield 'error_403.json' => ['error_403.json', 403, [
			['AUTH', 'Wrong token!'],
		]];

		yield 'error_400.json' => ['error_400.json', 400, [
			['VALIDATION_ERROR', 'リクエストフォームに問題があります。構造に誤りがあるか、スキーマに反しています。'],
			['INSUFFICIENT', 'この項目の内容が少なすぎます (最小: 1)'],
			['REQUIRED', 'この項目は必須です'],
			['REQUIRED', 'この項目は必須です'],
		]];
	}

	public function loadFixture($filename): string
	{
		return FixtureLoader::loadResponse($filename);
	}
}
