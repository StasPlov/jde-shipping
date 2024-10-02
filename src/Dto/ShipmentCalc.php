<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class ShipmentCalc
{
	/**
	 * @JMS\Type("JdeShipping\Dto\ShipmentAddress")
	 * @var ShipmentAddress|null
	 */
	private ?ShipmentAddress $from = null;

	/**
	 * @JMS\Type("JdeShipping\Dto\ShipmentAddress")
	 * @var ShipmentAddress|null
	 */
	private ?ShipmentAddress $to = null;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $type;

	/**
	 * @JMS\Type("bool")
	 * @var bool
	 */
	private bool $result;

	/**
	 * @JMS\Type("float")
	 * @var float|null
	 */
	private ?float $price = null;

	/**
	 * @JMS\Type("int")
	 * @var int|null
	 */
	private ?int $mindays = null;

	/**
	 * @JMS\Type("int")
	 * @var int|null
	 */
	private ?int $maxdays = null;

	/**
	 * @JMS\Type("array<JdeShipping\Dto\ShipmentService>")
	 * @var array<ShipmentService>
	 */
	private $services;

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
	 * Get the value of from
	 *
	 * @return ShipmentAddress|null
	 */
	public function getFrom(): ?ShipmentAddress
	{
		return $this->from;
	}

	/**
	 * Set the value of from
	 *
	 * @param ShipmentAddress|null  $from  
	 *
	 * @return self
	 */
	public function setFrom($from): self
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * Get the value of to
	 *
	 * @return ShipmentAddress|null
	 */
	public function getTo(): ?ShipmentAddress
	{
		return $this->to;
	}

	/**
	 * Set the value of to
	 *
	 * @param ShipmentAddress|null  $to  
	 *
	 * @return self
	 */
	public function setTo($to): self
	{
		$this->to = $to;

		return $this;
	}

	/**
	 * Get the value of type
	 *
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Set the value of type
	 *
	 * @param string  $type  
	 *
	 * @return self
	 */
	public function setType(string $type): self
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the value of result
	 *
	 * @return bool
	 */
	public function getResult(): bool
	{
		return $this->result;
	}

	/**
	 * Set the value of result
	 *
	 * @param bool  $result  
	 *
	 * @return self
	 */
	public function setResult(bool $result): self
	{
		$this->result = $result;

		return $this;
	}

	/**
	 * Get the value of price
	 *
	 * @return float|null
	 */
	public function getPrice(): ?float
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @param float|null  $price  
	 *
	 * @return self
	 */
	public function setPrice($price): self
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of mindays
	 *
	 * @return int|null
	 */
	public function getMindays(): ?int
	{
		return $this->mindays;
	}

	/**
	 * Set the value of mindays
	 *
	 * @param int|null  $mindays  
	 *
	 * @return self
	 */
	public function setMindays($mindays): self
	{
		$this->mindays = $mindays;

		return $this;
	}

	/**
	 * Get the value of maxdays
	 *
	 * @return int|null
	 */
	public function getMaxdays(): ?int
	{
		return $this->maxdays;
	}

	/**
	 * Set the value of maxdays
	 *
	 * @param int|null  $maxdays  
	 *
	 * @return self
	 */
	public function setMaxdays($maxdays): self
	{
		$this->maxdays = $maxdays;

		return $this;
	}

	/**
	 * Get the value of services
	 *
	 * @return array<ShipmentService>
	 */
	public function getServices()
	{
		return $this->services;
	}

	/**
	 * Set the value of services
	 *
	 * @param array<ShipmentService>  $services  
	 *
	 * @return self
	 */
	public function setServices($services): self
	{
		$this->services = $services;

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
    public function getError(): ?string {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @param string|null  $error  
     *
     * @return self
     */
    public function setError($error): self {
        $this->error = $error;

        return $this;
    }
}
