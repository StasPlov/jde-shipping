<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class ShipmentService
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $item;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $price;

	/**
	 * @JMS\Type("int")
	 * @var int|null
	 */
	private ?int $km = null;

	/**
	 * @JMS\Type("string")
	 * @var string|null
	 */
	private ?string $info = null;

	/**
	 * @JMS\Type("string")
	 * @var string|null
	 */
	private ?string $error = null;

	/**
	 * Get the value of item
	 *
	 * @return string
	 */
	public function getItem(): string
	{
		return $this->item;
	}

	/**
	 * Set the value of item
	 *
	 * @param string  $item  
	 *
	 * @return self
	 */
	public function setItem(string $item): self
	{
		$this->item = $item;

		return $this;
	}

	/**
	 * Get the value of price
	 *
	 * @return string
	 */
	public function getPrice(): string
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @param string  $price  
	 *
	 * @return self
	 */
	public function setPrice(string $price): self
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of km
	 *
	 * @return int|null
	 */
	public function getKm(): ?int
	{
		return $this->km;
	}

	/**
	 * Set the value of km
	 *
	 * @param int|null  $km  
	 *
	 * @return self
	 */
	public function setKm($km): self
	{
		$this->km = $km;

		return $this;
	}

	/**
	 * Get the value of info
	 *
	 * @return string|null
	 */
	public function getInfo(): ?string
	{
		return $this->info;
	}

	/**
	 * Set the value of info
	 *
	 * @param string|null  $info  
	 *
	 * @return self
	 */
	public function setInfo($info): self
	{
		$this->info = $info;

		return $this;
	}

	/**
	 * Get the value of error
	 *
	 * @return string|null
	 */
	public function getError(): ?string
	{
		return $this->error;
	}

	/**
	 * Set the value of error
	 *
	 * @param string|null  $error  
	 *
	 * @return self
	 */
	public function setError($error): self
	{
		$this->error = $error;

		return $this;
	}
}
