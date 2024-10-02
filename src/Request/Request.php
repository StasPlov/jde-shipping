<?php

declare(strict_types=1);

namespace JdeShipping\Request;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;
use Traversable;
use JdeShipping\Serializer\JsonSerializableTrait;

abstract class Request implements RequestInterface, IteratorAggregate, JsonSerializable
{
	use JsonSerializableTrait;

	/**
	 * @var bool
	 */
	const PRIVATE = false;

	/**
	 * @var string
	 */
	const METHOD = 'POST';

	/**
	 * @var string
	 */
	const URL = '';

	/**
	 * @var class-string
	 */
	const DTO = __CLASS__;

	public function getIterator(): Traversable
	{
		return new ArrayIterator(
			$this->jsonSerialize()
		);
	}
}
