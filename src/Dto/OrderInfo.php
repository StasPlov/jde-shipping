<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class OrderInfo
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $cargostatus;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $takeonstockdatetime;

	/**
	 * Get the value of cargostatus
	 *
	 * @return string
	 */
	public function getCargostatus(): string
	{
		return $this->cargostatus;
	}

	/**
	 * Set the value of cargostatus
	 *
	 * @param string  $cargostatus  
	 *
	 * @return static
	 */
	public function setCargostatus(string $cargostatus): self
	{
		$this->cargostatus = $cargostatus;

		return $this;
	}

	/**
	 * Get the value of takeonstockdatetime
	 *
	 * @return string
	 */
	public function getTakeonstockdatetime(): string
	{
		return $this->takeonstockdatetime;
	}

	/**
	 * Set the value of takeonstockdatetime
	 *
	 * @param string  $takeonstockdatetime  
	 *
	 * @return static
	 */
	public function setTakeonstockdatetime(string $takeonstockdatetime): self
	{
		$this->takeonstockdatetime = $takeonstockdatetime;

		return $this;
	}
}
