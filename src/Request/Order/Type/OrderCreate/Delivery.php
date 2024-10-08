<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

use JdeShipping\Request\Request;

class Delivery extends Request
{
	/**
	 * @var string|null
	 */
	private ?string $period = null;

	/**
	 * @var int|null
	 */
	private ?int $payer = null;

	/**
	 * Get когда забрать груз, временной промежуток
	 *
	 * @return string|null
	 */
	public function getPeriod(): ?string
	{
		return $this->period;
	}

	/**
	 * Set когда забрать груз, временной промежуток
	 *
	 * @param string|null  $period  Когда забрать груз, временной промежуток
	 *
	 * @return static
	 */
	public function setPeriod($period): self
	{
		$this->period = $period;

		return $this;
	}

	/**
	 * Get Плательщик
	 * 
	 * 1 - отправитель
	 * 2 - получатель
	 * 3 - Третье лицо
	 *
	 * @return int|null
	 */
	public function getPayer(): ?int
	{
		return $this->payer;
	}

	/**
	 * Set Плательщик
	 * 
	 * 1 - отправитель
	 * 2 - получатель
	 * 3 - Третье лицо
	 *
	 * @param int|null  $payer Плательщик
	 *
	 * @return static
	 */
	public function setPayer($payer): self
	{
		$this->payer = $payer;

		return $this;
	}
}
