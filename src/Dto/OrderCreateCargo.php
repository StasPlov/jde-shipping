<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class OrderCreateCargo
{
	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $id;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $code;

	/**
	 * Get the value of id
	 *
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param int  $id  
	 *
	 * @return static
	 */
	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of code
	 *
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @param string  $code  
	 *
	 * @return static
	 */
	public function setCode(string $code): self
	{
		$this->code = $code;

		return $this;
	}
}
