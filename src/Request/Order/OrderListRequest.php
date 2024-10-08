<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order;

use JdeShipping\Dto\Order;
use JdeShipping\Request\Request;

final class OrderListRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'POST';
	const URL = 'orders';
	const DTO = Order::class;

	/**
	 * @var string|null
	 */
	private ?string $dateBegin = null;

	/**
	 * @var string|null
	 */
	private ?string $dateEnd = null;

	/**
	 * @var string|null
	 */
	private ?string $states = null;

	/**
	 * Get начальная дата (01.01.2018 00:00:00)
	 *
	 * @return string|null
	 */
	public function getDateBegin(): ?string
	{
		return $this->dateBegin;
	}

	/**
	 * Set начальная дата (01.01.2018 00:00:00)
	 *
	 * @param string|null  $dateBegin  Начальная дата (01.01.2018 00:00:00)
	 *
	 * @return static
	 */
	public function setDateBegin($dateBegin): self
	{
		$this->dateBegin = $dateBegin;

		return $this;
	}

	/**
	 * Get конечная дата (05.03.2018 00:00:00)
	 *
	 * @return string|null
	 */
	public function getDateEnd(): ?string
	{
		return $this->dateEnd;
	}

	/**
	 * Set конечная дата (05.03.2018 00:00:00)
	 *
	 * @param string|null  $dateEnd  Конечная дата (05.03.2018 00:00:00)
	 *
	 * @return static
	 */
	public function setDateEnd($dateEnd): self
	{
		$this->dateEnd = $dateEnd;

		return $this;
	}

	/**
	 * Get Тип состояния
	 * 
	 * NewOrderByClient - Обработка заявки на перевозку
	 * NotDone - Груз не доставлен
	 * OnTerminalPickup	 - Груз принят к перевозке
	 * OnRoad - Груз в пути
	 * Delivering - Груз прибыл
	 * Delivered - Груз доставлен
	 *
	 * @return string|null
	 */
	public function getStates(): ?string
	{
		return $this->states;
	}

	/**
	 * Set Тип состояния
	 * 
	 * NewOrderByClient - Обработка заявки на перевозку
	 * NotDone - Груз не доставлен
	 * OnTerminalPickup	 - Груз принят к перевозке
	 * OnRoad - Груз в пути
	 * Delivering - Груз прибыл
	 * Delivered - Груз доставлен
	 *
	 * @param string|null  $states тип состояния
	 *
	 * @return static
	 */
	public function setStates($states): self
	{
		$this->states = $states;

		return $this;
	}
}
