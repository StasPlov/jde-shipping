<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Order
{
	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $id;

	/**
	 * @JMS\Type("JdeShipping\Dto\OrderInfo")
	 * @var OrderInfo
	 */
	private $info;

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
	 * Get the value of info
	 *
	 * @return OrderInfo
	 */
	public function getInfo(): OrderInfo
	{
		return $this->info;
	}

	/**
	 * Set the value of info
	 *
	 * @param OrderInfo  $info  
	 *
	 * @return static
	 */
	public function setInfo(OrderInfo $info): self
	{
		$this->info = $info;

		return $this;
	}
}
