<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class ShipmentAddress
{
	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $type;

	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $km;

	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $code;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $mstName;

	/**
	 * @JMS\Type("float")
	 * @var float
	 */
	private float $addrLat;

	/**
	 * @JMS\Type("float")
	 * @var float
	 */
	private float $addrLon;

	/**
	 * Get the value of type
	 *
	 * @return int
	 */
	public function getType(): int
	{
		return $this->type;
	}

	/**
	 * Set the value of type
	 *
	 * @param int  $type  
	 *
	 * @return self
	 */
	public function setType(int $type): self
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the value of km
	 *
	 * @return int
	 */
	public function getKm(): int
	{
		return $this->km;
	}

	/**
	 * Set the value of km
	 *
	 * @param int  $km  
	 *
	 * @return self
	 */
	public function setKm(int $km): self
	{
		$this->km = $km;

		return $this;
	}

	/**
	 * Get the value of code
	 *
	 * @return int
	 */
	public function getCode(): int
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @param int  $code  
	 *
	 * @return self
	 */
	public function setCode(int $code): self
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get the value of mstName
	 *
	 * @return string
	 */
	public function getMstName(): string
	{
		return $this->mstName;
	}

	/**
	 * Set the value of mstName
	 *
	 * @param string  $mstName  
	 *
	 * @return self
	 */
	public function setMstName(string $mstName): self
	{
		$this->mstName = $mstName;

		return $this;
	}

	/**
	 * Get the value of addrLat
	 *
	 * @return float
	 */
	public function getAddrLat(): float
	{
		return $this->addrLat;
	}

	/**
	 * Set the value of addrLat
	 *
	 * @param float  $addrLat  
	 *
	 * @return self
	 */
	public function setAddrLat(float $addrLat): self
	{
		$this->addrLat = $addrLat;

		return $this;
	}

	/**
	 * Get the value of addrLon
	 *
	 * @return float
	 */
	public function getAddrLon(): float
	{
		return $this->addrLon;
	}

	/**
	 * Set the value of addrLon
	 *
	 * @param float  $addrLon  
	 *
	 * @return self
	 */
	public function setAddrLon(float $addrLon): self
	{
		$this->addrLon = $addrLon;

		return $this;
	}
}
