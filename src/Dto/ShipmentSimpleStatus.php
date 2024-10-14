<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class ShipmentSimpleStatus
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
	private string $status;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $date;

	/**
	 * Get идентификатор накладной
	 *
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * Set идентификатор накладной
	 *
	 * @param int  $id  Идентификатор накладной
	 *
	 * @return self
	 */
	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get Текущий статус доставки. 
	 * 
	 * Возможные значения:
	 * NewOrderByClient – оформлен новый заказ по инициативе клиента
	 * NotDone– заказ отменен
	 * OnTerminalPickup– посылка находится на терминале приема отправления
	 * OnRoad– посылка находится в пути
	 * OnTerminalDelivery– посылка находится на терминале доставки
	 * Delivering – посылка выведена на доставку
	 * Delivered – посылка доставлена получателю
	 * Lost – посылка утеряна
	 * Problem– с посылкой возникла проблемная ситуация
	 * ReturnedFromDelivery– посылка возвращена с доставки
	 *
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Set Текущий статус доставки. 
	 * 
	 * Возможные значения:
	 * NewOrderByClient – оформлен новый заказ по инициативе клиента
	 * NotDone– заказ отменен
	 * OnTerminalPickup– посылка находится на терминале приема отправления
	 * OnRoad– посылка находится в пути
	 * OnTerminalDelivery– посылка находится на терминале доставки
	 * Delivering – посылка выведена на доставку
	 * Delivered – посылка доставлена получателю
	 * Lost – посылка утеряна
	 * Problem– с посылкой возникла проблемная ситуация
	 * ReturnedFromDelivery– посылка возвращена с доставки
	 *
	 * @param string  $status  статус доставки
	 *
	 * @return self
	 */
	public function setStatus(string $status): self
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get Дата
	 *
	 * @return string
	 */
	public function getDate(): string
	{
		return $this->date;
	}

	/**
	 * Set Дата
	 *
	 * @param string  $date  
	 *
	 * @return self
	 */
	public function setDate(string $date): self
	{
		$this->date = $date;

		return $this;
	}
}
