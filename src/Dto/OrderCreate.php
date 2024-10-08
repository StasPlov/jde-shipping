<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class OrderCreate
{
	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("orderNumber")
	 * @var string
	 */
	private string $orderNumber;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("orderNumberStr")
	 * @var string|null
	 */
	private ?string $orderNumberStr;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("pinCode")
	 * @var string
	 */
	private string $pinCode;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $status;

	/**
	 * @JMS\Type("JdeShipping\Dto\OrderCreateCargo")
	 * @var array<OrderCreateCargo>|null
	 */
	private $cargos;

	/**
	 * Get the value of orderNumber
	 *
	 * @return string
	 */
	public function getOrderNumber(): string
	{
		return $this->orderNumber;
	}

	/**
	 * Set the value of orderNumber
	 *
	 * @param string  $orderNumber  
	 *
	 * @return static
	 */
	public function setOrderNumber(string $orderNumber): self
	{
		$this->orderNumber = $orderNumber;

		return $this;
	}

	/**
	 * Get the value of orderNumberStr
	 *
	 * @return string|null
	 */
	public function getOrderNumberStr(): ?string
	{
		return $this->orderNumberStr;
	}

	/**
	 * Set the value of orderNumberStr
	 *
	 * @param string|null  $orderNumberStr  
	 *
	 * @return static
	 */
	public function setOrderNumberStr($orderNumberStr): self
	{
		$this->orderNumberStr = $orderNumberStr;

		return $this;
	}

	/**
	 * Get the value of pinCode
	 *
	 * @return string
	 */
	public function getPinCode(): string
	{
		return $this->pinCode;
	}

	/**
	 * Set the value of pinCode
	 *
	 * @param string  $pinCode  
	 *
	 * @return static
	 */
	public function setPinCode(string $pinCode): self
	{
		$this->pinCode = $pinCode;

		return $this;
	}

	/**
	 * Get the value of status
	 *
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @param string  $status  
	 *
	 * @return static
	 */
	public function setStatus(string $status): self
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get the value of cargos
	 *
	 * @return array<OrderCreateCargo>|null
	 */
	public function getCargos(): ?array
	{
		return $this->cargos;
	}

	/**
	 * Set the value of cargos
	 *
	 * @param array<OrderCreateCargo>|null  $cargos  
	 *
	 * @return static
	 */
	public function setCargos(?array $cargos): self
	{
		$this->cargos = $cargos;

		return $this;
	}
}
