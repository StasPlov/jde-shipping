<?php

declare(strict_types=1);

namespace JdeShipping\Request\Geo;

use JdeShipping\Dto\City;
use JdeShipping\Request\Request;

final class GeoCitySearchRequest extends Request
{
	const PRIVATE = false;
	const METHOD = 'GET';
	const URL = 'geo/SearchCity';
	const DTO = City::class;

	/**
	 * @var int|null
	 */
	private ?int $mode = null;

	/**
	 * Get the value of mode
	 *
	 * @return int|null
	 */
	public function getMode(): ?int
	{
		return $this->mode;
	}

	/**
	 * Set the value of mode
	 * 
	 * 0 - все пункты
	 * 1 - пункты приема
	 * 2 - пункты выдачи
	 *
	 * @param int|null  $mode  
	 *
	 * @return static
	 */
	public function setMode($mode): self
	{
		$this->mode = $mode;

		return $this;
	}
}
