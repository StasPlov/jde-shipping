<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

use JdeShipping\Request\Request;
use JMS\Serializer\Annotation as JMS;

class Service extends Request
{
	/**
	 * @JMS\SerializedName("payOnDelivery")
	 * @var bool|null
	 */
	private ?bool $payOnDelivery = null;

	/**
	 * @JMS\SerializedName("payOnDeliveryAmount")
	 * @var float|null
	 */
	private ?float $payOnDeliveryAmount = null;

	/**
	 * @var int|null
	 */
	private ?int $upak = null;

	/**
	 * @var bool|null
	 */
	private ?bool $neg = null;

	/**
	 * @var bool|null
	 */
	private ?bool $teplo = null;

	/**
	 * @var bool|null
	 */
	private ?bool $labove = null;

	/**
	 * @var bool|null
	 */
	private ?bool $hrup = null;

	/**
	 * @var bool|null
	 */
	private ?bool $seal = null;

	/**
	 * @var bool|null
	 */
	private ?bool $zaezd = null;

	/**
	 * @var bool|null
	 */
	private ?bool $obr = null;

	/**
	 * @JMS\SerializedName("docsForward")
	 * @var bool|null
	 */
	private ?bool $docsForward = null;

	/**
	 * @JMS\SerializedName("docsBack")
	 * @var bool|null
	 */
	private ?bool $docsBack = null;

	/**
	 * @var bool|null
	 */
	private ?bool $pallet = null;

	/**
	 * @var bool|null
	 */
	private ?bool $palletPack = null;

	/**
	 * Get нужен ли наложенный платеж (использовать при оформленном договоре)
	 *
	 * @return bool|null
	 */
	public function getPayOnDelivery(): ?bool
	{
		return $this->payOnDelivery;
	}

	/**
	 * Set нужен ли наложенный платеж (использовать при оформленном договоре)
	 *
	 * @param bool|null  $payOnDelivery  Нужен ли наложенный платеж (использовать при оформленном договоре)
	 *
	 * @return static
	 */
	public function setPayOnDelivery($payOnDelivery): self
	{
		$this->payOnDelivery = $payOnDelivery;

		return $this;
	}

	/**
	 * Get размер наложенного платежа (использовать при оформленном договоре)
	 *
	 * @return float|null
	 */
	public function getPayOnDeliveryAmount(): ?float
	{
		return $this->payOnDeliveryAmount;
	}

	/**
	 * Set размер наложенного платежа (использовать при оформленном договоре)
	 *
	 * @param float|null  $payOnDeliveryAmount  Размер наложенного платежа (использовать при оформленном договоре)
	 *
	 * @return static
	 */
	public function setPayOnDeliveryAmount($payOnDeliveryAmount): self
	{
		$this->payOnDeliveryAmount = $payOnDeliveryAmount;

		return $this;
	}

	/**
	 * Get
	 *
	 * @return int|null
	 */
	public function getUpak(): ?int
	{
		return $this->upak;
	}

	/**
	 * Set
	 *
	 * @param int|null  $upak Бочка
	 *
	 * @return static
	 */
	public function setUpak($upak): self
	{
		$this->upak = $upak;

		return $this;
	}

	/**
	 * Get 0 - габаритный
	 *
	 * @return bool|null
	 */
	public function getNeg(): ?bool
	{
		return $this->neg;
	}

	/**
	 * Set 0 - габаритный
	 *
	 * @param bool|null  $neg  0 - габаритный
	 *
	 * @return static
	 */
	public function setNeg($neg): self
	{
		$this->neg = $neg;

		return $this;
	}

	/**
	 * Get перевозка в тепле
	 *
	 * @return bool|null
	 */
	public function getTeplo(): ?bool
	{
		return $this->teplo;
	}

	/**
	 * Set перевозка в тепле
	 *
	 * @param bool|null  $teplo  Перевозка в тепле
	 *
	 * @return static
	 */
	public function setTeplo($teplo): self
	{
		$this->teplo = $teplo;

		return $this;
	}

	/**
	 * Get если есть места длиннее 4 метров
	 *
	 * @return bool|null
	 */
	public function getLabove(): ?bool
	{
		return $this->labove;
	}

	/**
	 * Set если есть места длиннее 4 метров
	 *
	 * @param bool|null  $labove  Если есть места длиннее 4 метров
	 *
	 * @return static
	 */
	public function setLabove($labove): self
	{
		$this->labove = $labove;

		return $this;
	}

	/**
	 * Get хрупкий груз
	 *
	 * @return bool|null
	 */
	public function getHrup(): ?bool
	{
		return $this->hrup;
	}

	/**
	 * Set хрупкий груз
	 *
	 * @param bool|null  $hrup  Хрупкий груз
	 *
	 * @return static
	 */
	public function setHrup($hrup): self
	{
		$this->hrup = $hrup;

		return $this;
	}

	/**
	 * Get опломбирования мест с укладкой в тару ТК
	 *
	 * @return bool|null
	 */
	public function getSeal(): ?bool
	{
		return $this->seal;
	}

	/**
	 * Set опломбирования мест с укладкой в тару ТК
	 *
	 * @param bool|null  $seal  Опломбирования мест с укладкой в тару ТК
	 *
	 * @return static
	 */
	public function setSeal($seal): self
	{
		$this->seal = $seal;

		return $this;
	}

	/**
	 * Get заезд в офис за документами
	 *
	 * @return bool|null
	 */
	public function getZaezd(): ?bool
	{
		return $this->zaezd;
	}

	/**
	 * Set заезд в офис за документами
	 *
	 * @param bool|null  $zaezd  Заезд в офис за документами
	 *
	 * @return static
	 */
	public function setZaezd($zaezd): self
	{
		$this->zaezd = $zaezd;

		return $this;
	}

	/**
	 * Get обрешетка
	 *
	 * @return bool|null
	 */
	public function getObr(): ?bool
	{
		return $this->obr;
	}

	/**
	 * Set обрешетка
	 *
	 * @param bool|null  $obr  Обрешетка
	 *
	 * @return static
	 */
	public function setObr($obr): self
	{
		$this->obr = $obr;

		return $this;
	}

	/**
	 * Get аеревозка документов в один конец
	 *
	 * @return bool|null
	 */
	public function getDocsForward(): ?bool
	{
		return $this->docsForward;
	}

	/**
	 * Set Перевозка документов в один конец
	 *
	 * @param bool|null  $docsForward  Перевозка документов в один конец
	 *
	 * @return static
	 */
	public function setDocsForward($docsForward): self
	{
		$this->docsForward = $docsForward;

		return $this;
	}

	/**
	 * Get возврата документов
	 *
	 * @return bool|null
	 */
	public function getDocsBack(): ?bool
	{
		return $this->docsBack;
	}

	/**
	 * Set возврата документов
	 *
	 * @param bool|null  $docsBack  Возврата документов
	 *
	 * @return static
	 */
	public function setDocsBack($docsBack): self
	{
		$this->docsBack = $docsBack;

		return $this;
	}

	/**
	 * Get предоставления поддонов (паллет)
	 *
	 * @return bool|null
	 */
	public function getPallet(): ?bool
	{
		return $this->pallet;
	}

	/**
	 * Set предоставления поддонов (паллет)
	 *
	 * @param bool|null  $pallet  Предоставления поддонов (паллет)
	 *
	 * @return static
	 */
	public function setPallet($pallet): self
	{
		$this->pallet = $pallet;

		return $this;
	}

	/**
	 * Get упаковка в стейч-пленку (паллетирование)
	 *
	 * @return bool|null
	 */
	public function getPalletPack(): ?bool
	{
		return $this->palletPack;
	}

	/**
	 * Set упаковка в стейч-пленку (паллетирование)
	 *
	 * @param bool|null  $palletPack  Упаковка в стейч-пленку (паллетирование)
	 *
	 * @return static
	 */
	public function setPalletPack($palletPack): self
	{
		$this->palletPack = $palletPack;

		return $this;
	}
}
