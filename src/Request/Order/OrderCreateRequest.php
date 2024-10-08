<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order;

use JdeShipping\Dto\OrderCreate;
use JdeShipping\Request\Order\Type\OrderCreate\Delivery;
use JdeShipping\Request\Order\Type\OrderCreate\PersonReceiver;
use JdeShipping\Request\Order\Type\OrderCreate\PersonSender;
use JdeShipping\Request\Order\Type\OrderCreate\PersonThird;
use JdeShipping\Request\Order\Type\OrderCreate\Pickup;
use JdeShipping\Request\Order\Type\OrderCreate\Service;
use JdeShipping\Request\Request;
use JMS\Serializer\Annotation as JMS;

final class OrderCreateRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'POST';
	const URL = 'orders/create';
	const DTO = OrderCreate::class;

	/**
	 * @var string|null
	 */
	private ?string $from = null;

	/**
	 * @var string|null
	 */
	private ?string $to = null;

	/**
	 * @var float|null
	 */
	private ?float $volume = null;

	/**
	 * @var float|null
	 */
	private ?float $weight = null;

	/**
	 * @JMS\SerializedName("insValue")
	 * @var float|null
	 */
	private ?float $insValue = null;

	/**
	 * @var int|null
	 */
	private ?int $positions = null;

	/**
	 * @var string|null
	 */
	private ?string $ref = null;

	/**
	 * @var Service|null
	 */
	private ?Service $services = null;

	/**
	 * @var string|null
	 */
	private ?string $gruzdesc = null;

	/**
	 * @var bool|null
	 */
	private ?bool $pickupService = null;

	/**
	 * @var bool|null
	 */
	private ?bool $deliveryService = null;

	/**
	 * @var int|null
	 */
	private ?int $payer = null;

	/**
	 * @var string|null
	 */
	private ?string $note = null;

	/**
	 * @var PersonSender|null
	 */
	private ?PersonSender $sender = null;

	/**
	 * @var Pickup|null
	 */
	private ?Pickup $pickup = null;

	/**
	 * @var Delivery|null
	 */
	private ?Delivery $delivery = null;

	/**
	 * @var array<Cargo>|null
	 */
	private ?array $cargos = null;

	/**
	 * @var PersonReceiver|null
	 */
	private ?PersonReceiver $receiver = null;

	/**
	 * @var PersonThird|null
	 */
	private ?PersonThird $third = null;

	/**
	 * Get код терминала откуда
	 *
	 * @return string|null
	 */
	public function getFrom(): ?string
	{
		return $this->from;
	}

	/**
	 * Set код терминала откуда
	 *
	 * @param string|null  $from  Код терминала откуда
	 *
	 * @return static
	 */
	public function setFrom($from): self
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * Get код терминала куда
	 *
	 * @return string|null
	 */
	public function getTo(): ?string
	{
		return $this->to;
	}

	/**
	 * Set код терминала куда
	 *
	 * @param string|null  $to  Код терминала куда
	 *
	 * @return static
	 */
	public function setTo($to): self
	{
		$this->to = $to;

		return $this;
	}

	/**
	 * Get объем, м3
	 *
	 * @return float|null
	 */
	public function getVolume(): ?float
	{
		return $this->volume;
	}

	/**
	 * Set объем, м3
	 *
	 * @param float|null  $volume  Объем, м3
	 *
	 * @return static
	 */
	public function setVolume($volume): self
	{
		$this->volume = $volume;

		return $this;
	}

	/**
	 * Get вес, кг
	 *
	 * @return float|null
	 */
	public function getWeight(): ?float
	{
		return $this->weight;
	}

	/**
	 * Set вес, кг
	 *
	 * @param float|null  $weight  Вес, кг
	 *
	 * @return static
	 */
	public function setWeight($weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Get объявленная ценность
	 *
	 * @return float|null
	 */
	public function getInsValue(): ?float
	{
		return $this->insValue;
	}

	/**
	 * Set объявленная ценность
	 *
	 * @param float|null  $insValue  Объявленная ценность
	 *
	 * @return static
	 */
	public function setInsValue($insValue): self
	{
		$this->insValue = $insValue;

		return $this;
	}

	/**
	 * Get позиций
	 *
	 * @return int|null
	 */
	public function getPositions(): ?int
	{
		return $this->positions;
	}

	/**
	 * Set позиций
	 *
	 * @param int|null  $positions  Позиций
	 *
	 * @return static
	 */
	public function setPositions($positions): self
	{
		$this->positions = $positions;

		return $this;
	}

	/**
	 * Get внутренний номер заказа Клиента
	 *
	 * @return string|null
	 */
	public function getRef(): ?string
	{
		return $this->ref;
	}

	/**
	 * Set внутренний номер заказа Клиента
	 *
	 * @param string|null  $ref  Внутренний номер заказа Клиента
	 *
	 * @return static
	 */
	public function setRef($ref): self
	{
		$this->ref = $ref;

		return $this;
	}

	/**
	 * Get дополнительные услуги
	 *
	 * @return Service|null
	 */
	public function getServices(): ?Service
	{
		return $this->services;
	}

	/**
	 * Set дополнительные услуги
	 *
	 * @param Service|null  $services  Дополнительные услуги
	 *
	 * @return static
	 */
	public function setServices($services): self
	{
		$this->services = $services;

		return $this;
	}

	/**
	 * Get характеристика груза
	 *
	 * @return string|null
	 */
	public function getGruzdesc(): ?string
	{
		return $this->gruzdesc;
	}

	/**
	 * Set характеристика груза
	 *
	 * @param string|null  $gruzdesc  Характеристика груза
	 *
	 * @return static
	 */
	public function setGruzdesc($gruzdesc): self
	{
		$this->gruzdesc = $gruzdesc;

		return $this;
	}

	/**
	 * Get забор груза от двери
	 *
	 * @return bool|null
	 */
	public function getPickupService(): ?bool
	{
		return $this->pickupService;
	}

	/**
	 * Set забор груза от двери
	 *
	 * @param bool|null  $pickupService  Забор груза от двери
	 *
	 * @return static
	 */
	public function setPickupService($pickupService): self
	{
		$this->pickupService = $pickupService;

		return $this;
	}

	/**
	 * Get доставки до двери
	 *
	 * @return bool|null
	 */
	public function getDeliveryService(): ?bool
	{
		return $this->deliveryService;
	}

	/**
	 * Set доставки до двери
	 *
	 * @param bool|null  $deliveryService  Доставки до двери
	 *
	 * @return static
	 */
	public function setDeliveryService($deliveryService): self
	{
		$this->deliveryService = $deliveryService;

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

	/**
	 * Get примечание
	 *
	 * @return string|null
	 */
	public function getNote(): ?string
	{
		return $this->note;
	}

	/**
	 * Set примечание
	 *
	 * @param string|null  $note  Примечание
	 *
	 * @return static
	 */
	public function setNote($note): self
	{
		$this->note = $note;

		return $this;
	}

	/**
	 * Get информация об отправителе
	 *
	 * @return PersonSender|null
	 */
	public function getSender(): ?PersonSender
	{
		return $this->sender;
	}

	/**
	 * Set информация об отправителе
	 *
	 * @param PersonSender|null  $sender  Информация об отправителе
	 *
	 * @return static
	 */
	public function setSender($sender): self
	{
		$this->sender = $sender;

		return $this;
	}

	/**
	 * Get забор груза
	 *
	 * @return Pickup|null
	 */
	public function getPickup(): ?Pickup
	{
		return $this->pickup;
	}

	/**
	 * Set забор груза
	 *
	 * @param Pickup|null  $pickup  Забор груза
	 *
	 * @return static
	 */
	public function setPickup($pickup): self
	{
		$this->pickup = $pickup;

		return $this;
	}

	/**
	 * Get Доставки
	 *
	 * @return Delivery|null
	 */
	public function getDelivery(): ?Delivery
	{
		return $this->delivery;
	}

	/**
	 * Set Доставки
	 *
	 * @param Delivery|null  $delivery  
	 *
	 * @return static
	 */
	public function setDelivery($delivery): self
	{
		$this->delivery = $delivery;

		return $this;
	}

	/**
	 * Get информация о грузах
	 *
	 * @return array<Cargo>|null
	 */
	public function getCargos(): array
	{
		return $this->cargos;
	}

	/**
	 * Set информация о грузах
	 *
	 * @param array<Cargo>|null  $cargos  Информация о грузах
	 *
	 * @return static
	 */
	public function setCargos($cargos): self
	{
		$this->cargos = $cargos;

		return $this;
	}

	/**
	 * Get получатель
	 *
	 * @return PersonReceiver|null
	 */
	public function getReceiver(): ?PersonReceiver
	{
		return $this->receiver;
	}

	/**
	 * Set получатель
	 *
	 * @param PersonReceiver|null  $receiver  Получатель
	 *
	 * @return static
	 */
	public function setReceiver($receiver): self
	{
		$this->receiver = $receiver;

		return $this;
	}

	/**
	 * Get данные третьего лица
	 *
	 * @return PersonThird|null
	 */
	public function getThird(): ?PersonThird
	{
		return $this->third;
	}

	/**
	 * Set данные третьего лица
	 *
	 * @param PersonThird|null  $third  Данные третьего лица
	 *
	 * @return static
	 */
	public function setThird($third): self
	{
		$this->third = $third;

		return $this;
	}
}
