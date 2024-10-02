<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\Location;
use JdeShipping\Request\Request;

final class CargoStatus extends Request
{
	const PRIVATE = true;
	const METHOD = 'POST';
	const URL = 'cargos/cargos';
	const DTO = self::class;

	/**
	 * @var string|null
	 */
	private $ttn = null;

	/**
	 * @var string|null
	 */
	private $ref = null;

	/**
	 * Get the value of ttn
	 *
	 * @return string|null
	 */
	public function getTtn(): ?string
	{
		return $this->ttn;
	}

	/**
	 * Set the value of ttn
	 *
	 * @param string|null  $ttn  
	 *
	 * @return self
	 */
	public function setTtn($ttn): self
	{
		$this->ttn = $ttn;

		return $this;
	}

	/**
	 * Get the value of ref
	 *
	 * @return string|null
	 */
	public function getRef(): ?string
	{
		return $this->ref;
	}

	/**
	 * Set the value of ref
	 *
	 * @param string|null  $ref  
	 *
	 * @return self
	 */
	public function setRef($ref): self
	{
		$this->ref = $ref;

		return $this;
	}
}
