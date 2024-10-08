<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

class Pickup extends Delivery
{
	/**
	 * @var string|null
	 */
	private ?string $date = null;

	/**
	 * Get желаемая передачи отправления
	 *
	 * @return string|null
	 */
	public function getDate(): ?string
	{
		return $this->date;
	}

	/**
	 * Set желаемая передачи отправления
	 *
	 * @param string|null  $date  Желаемая передачи отправления
	 *
	 * @return static
	 */
	public function setDate($date): self
	{
		$this->date = $date;

		return $this;
	}
}
