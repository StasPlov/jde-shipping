<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use DateTimeInterface;
use JMS\Serializer\Annotation as JMS;

class ShipmentNewStatus
{
	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $order;

	/**
	 * @JMS\Type("DateTime<'Y-m-d H:i:s.u'>")
	 * @var DateTimeInterface
	 */
	private DateTimeInterface $date;

	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $code;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $name;

	/**
	 * Get номер ТТН
	 *
	 * @return int
	 */
	public function getOrder(): int
	{
		return $this->order;
	}

	/**
	 * Set номер ТТН
	 *
	 * @param int  $order  Номер ТТН
	 *
	 * @return static
	 */
	public function setOrder(int $order): self
	{
		$this->order = $order;

		return $this;
	}

	/**
	 * Get дата, когда был установлен статус
	 *
	 * @return DateTimeInterface
	 */
	public function getDate(): DateTimeInterface
	{
		return $this->date;
	}

	/**
	 * Set дата, когда был установлен статус
	 *
	 * @param DateTimeInterface  $date  Дата, когда был установлен статус
	 *
	 * @return static
	 */
	public function setDate(DateTimeInterface $date): self
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get Код статуса:
	 * 
	 * 1130 – Отправление выдано Клиенту (Delivered)
	 * 1128 - Отправление передано в автоэкспедирование до Клиента (Delivering)
	 * 1126 - Отправление ожидает автоэкспедирования до клиента (WaitDelivering)
	 * 1124 – Отправление прибыло в пункт назначения (OnTerminalDelivery)
	 * 1122 – Отправление в пути (OnRoad)
	 * 1120 – Отправление принято к перевозке (OnTerminalPickup)
	 * 1118 - Заявка передана в автоэкспедирование от Клиента (Pickup)
	 * 1116 – Обработка заявки на перевозку (NewOrderByClient)
	 * 1099 – Заказ отменен (NotDone)
	 *
	 * @return int
	 */
	public function getCode(): int
	{
		return $this->code;
	}

	/**
	 * Set Код статуса:
	 * 
	 * 1130 – Отправление выдано Клиенту (Delivered)
	 * 1128 - Отправление передано в автоэкспедирование до Клиента (Delivering)
	 * 1126 - Отправление ожидает автоэкспедирования до клиента (WaitDelivering)
	 * 1124 – Отправление прибыло в пункт назначения (OnTerminalDelivery)
	 * 1122 – Отправление в пути (OnRoad)
	 * 1120 – Отправление принято к перевозке (OnTerminalPickup)
	 * 1118 - Заявка передана в автоэкспедирование от Клиента (Pickup)
	 * 1116 – Обработка заявки на перевозку (NewOrderByClient)
	 * 1099 – Заказ отменен (NotDone)
	 *
	 * @param int $code Код статуса
	 *
	 * @return static
	 */
	public function setCode(int $code): self
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get наименование статуса
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Set наименование статуса
	 *
	 * @param string  $name  Наименование статуса
	 *
	 * @return static
	 */
	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}
}
