<?php

declare(strict_types=1);

namespace JdeShipping\Request\Shipment;

use JdeShipping\Request\Request;
use JMS\Serializer\Annotation as JMS;

abstract class ShipmentCostCalcAbstract extends Request
{
	/**
	 * @var int|null
	 */
	private ?int $type = null;

	/**
	 * @var float|null
	 */
	private ?float $weight = null;

	/**
	 * @var float|null
	 */
	private ?float $volume = null;

	/**
	 * @var float|null
	 */
	private ?float $length = null;

	/**
	 * @var float|null
	 */
	private ?float $width = null;

	/**
	 * @var float|null
	 */
	private ?float $height = null;

	/**
	 * @var int|null
	 */
	private ?int $quantity = null;

	/**
	 * @var int|null
	 */
	private ?int $pickup = null;

	/**
	 * @var int|null
	 */
	private ?int $delivery = null;

	/**
	 * @var int|null
	 */
	private ?int $declared = null;

	/**
	 * @var string|null
	 */
	private ?string $services = null;

	/**
	 * @JMS\SerializedName("oversizeWeight")
	 * @var float|null
	 */
	private ?float $oversizeWeight = null;

	/**
	 * @JMS\SerializedName("oversizeVolume")
	 * @var float|null
	 */
	private ?float $oversizeVolume = null;

	/**
	 * @JMS\SerializedName("obrVolume")
	 * @var float|null
	 */
	private ?float $obrVolume = null;

	/**
	 * @JMS\SerializedName("obrK")
	 * @var float|null
	 */
	private ?float $obrK = null;

	/**
	 * @var string|null
	 */
	private ?string $individual = null;

	/**
	 * @var int|null
	 */
	private ?int $prMark = null;

	/**
	 * @var string|null
	 */
	private ?string $info = null;

	/**
	 * @return array|null
	 */
	public function getServices(): ?array
	{
		if (empty($this->services)) {
			return null;
		}

		if ($result = mb_split(',', $this->services)) {
			return $result;
		}

		return null;
	}

	/**
	 * @param array<JdeShipping::SERVICES_*>|null $services
	 * @return static
	 */
	public function setServices(?array $services): self
	{
		$this->services = implode(",", $services);
		return $this;
	}

	/**
	 * Get тип вида доставки. Список типов доставки можно получить запросом /calculator/PriceTypeListAvailable
	 *
	 * @return int|null
	 */
	public function getType(): ?int
	{
		return $this->type;
	}

	/**
	 * Set тип вида доставки. Список типов доставки можно получить запросом /calculator/PriceTypeListAvailable
	 *
	 * @param int|null  $type  Тип вида доставки. Список типов доставки можно получить запросом /calculator/PriceTypeListAvailable
	 *
	 * @return static
	 */
	public function setType($type): self
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get вес груза в кг.
	 *
	 * @return float|null
	 */
	public function getWeight(): ?float
	{
		return $this->weight;
	}

	/**
	 * Set вес груза в кг.
	 *
	 * @param float|null  $weight  Вес груза в кг.
	 *
	 * @return static
	 */
	public function setWeight($weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Get объем в м3
	 *
	 * @return float|null
	 */
	public function getVolume(): ?float
	{
		return $this->volume;
	}

	/**
	 * Set объем в м3
	 *
	 * @param float|null  $volume  Объем в м3
	 *
	 * @return static
	 */
	public function setVolume($volume): self
	{
		$this->volume = $volume;

		return $this;
	}

	/**
	 * Get при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return float|null
	 */
	public function getLength(): ?float
	{
		return $this->length;
	}

	/**
	 * Set при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @param float|null  $length  При отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return static
	 */
	public function setLength($length): self
	{
		$this->length = $length;

		return $this;
	}

	/**
	 * Get при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return float|null
	 */
	public function getWidth(): ?float
	{
		return $this->width;
	}

	/**
	 * Set при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @param float|null  $width  При отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return static
	 */
	public function setWidth($width): self
	{
		$this->width = $width;

		return $this;
	}

	/**
	 * Get при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return float|null
	 */
	public function getHeight(): ?float
	{
		return $this->height;
	}

	/**
	 * Set при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @param float|null  $height  При отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return static
	 */
	public function setHeight($height): self
	{
		$this->height = $height;

		return $this;
	}

	/**
	 * Get при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return int|null
	 */
	public function getQuantity(): ?int
	{
		return $this->quantity;
	}

	/**
	 * Set при отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @param int|null  $quantity  При отсутствии параметра volume участвует в вычислении общего объема
	 *
	 * @return static
	 */
	public function setQuantity($quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}

	/**
	 * Get 0 - нет
	 *
	 * @return int|null
	 */
	public function getPickup(): ?int
	{
		return $this->pickup;
	}

	/**
	 * Set 0 - нет
	 *
	 * @param int|null  $pickup  0 - нет
	 *
	 * @return static
	 */
	public function setPickup($pickup): self
	{
		$this->pickup = $pickup;

		return $this;
	}

	/**
	 * Get 0 - нет
	 *
	 * @return int|null
	 */
	public function getDelivery(): ?int
	{
		return $this->delivery;
	}

	/**
	 * Set 0 - нет
	 *
	 * @param int|null  $delivery  0 - нет
	 *
	 * @return static
	 */
	public function setDelivery($delivery): self
	{
		$this->delivery = $delivery;

		return $this;
	}

	/**
	 * Get объявленная ценность
	 *
	 * @return int|null
	 */
	public function getDeclared(): ?int
	{
		return $this->declared;
	}

	/**
	 * Set объявленная ценность
	 *
	 * @param int|null  $declared  Объявленная ценность
	 *
	 * @return static
	 */
	public function setDeclared($declared): self
	{
		$this->declared = $declared;

		return $this;
	}

	/**
	 * Get вес негабаритного груза, кг.
	 *
	 * @return float|null
	 */
	public function getOversizeWeight(): ?float
	{
		return $this->oversizeWeight;
	}

	/**
	 * Set вес негабаритного груза, кг.
	 *
	 * @param float|null  $oversizeWeight  Вес негабаритного груза, кг.
	 *
	 * @return static
	 */
	public function setOversizeWeight($oversizeWeight): self
	{
		$this->oversizeWeight = $oversizeWeight;

		return $this;
	}

	/**
	 * Get объем негабаритного груза, м3
	 *
	 * @return float|null
	 */
	public function getOversizeVolume(): ?float
	{
		return $this->oversizeVolume;
	}

	/**
	 * Set объем негабаритного груза, м3
	 *
	 * @param float|null  $oversizeVolume  Объем негабаритного груза, м3
	 *
	 * @return static
	 */
	public function setOversizeVolume($oversizeVolume): self
	{
		$this->oversizeVolume = $oversizeVolume;

		return $this;
	}

	/**
	 * Get объем груза для жесткой упаковки, м3
	 *
	 * @return float|null
	 */
	public function getObrVolume(): ?float
	{
		return $this->obrVolume;
	}

	/**
	 * Set объем груза для жесткой упаковки, м3
	 *
	 * @param float|null  $obrVolume  Объем груза для жесткой упаковки, м3
	 *
	 * @return static
	 */
	public function setObrVolume($obrVolume): self
	{
		$this->obrVolume = $obrVolume;

		return $this;
	}

	/**
	 * Get коэффициент 3: Применяется при одновременном наличии мест со сторонами менее 0,5 м и более 3м.
	 *
	 * @return float|null
	 */
	public function getObrK(): ?float
	{
		return $this->obrK;
	}

	/**
	 * Set коэффициент 3: Применяется при одновременном наличии мест со сторонами менее 0,5 м и более 3м.
	 *
	 * @param float|null  $obrK  Коэффициент 3: Применяется при одновременном наличии мест со сторонами менее 0,5 м и более 3м.
	 *
	 * @return static
	 */
	public function setObrK($obrK): self
	{
		$this->obrK = $obrK;

		return $this;
	}

	/**
	 * Get расчет будет выполняться по индивидуальному прайсу
	 *
	 * @return string|null
	 */
	public function getIndividual(): ?string
	{
		return $this->individual;
	}

	/**
	 * Set расчет будет выполняться по индивидуальному прайсу
	 *
	 * @param string|null  $individual  Расчет будет выполняться по индивидуальному прайсу
	 *
	 * @return static
	 */
	public function setIndividual($individual): self
	{
		$this->individual = $individual;

		return $this;
	}

	/**
	 * Get 1 - либо отсутствие признака - платная маркировка груза на филиале ЖДЭ
	 *
	 * @return int|null
	 */
	public function getPrMark(): ?int
	{
		return $this->prMark;
	}

	/**
	 * Set 1 - либо отсутствие признака - платная маркировка груза на филиале ЖДЭ
	 *
	 * @param int|null  $prMark  1 - либо отсутствие признака - платная маркировка груза на филиале ЖДЭ
	 *
	 * @return static
	 */
	public function setPrMark($prMark): self
	{
		$this->prMark = $prMark;

		return $this;
	}

	/**
	 * Get информация о предварительном расчете.
	 *
	 * @return string|null
	 */
	public function getInfo(): ?string
	{
		return $this->info;
	}

	/**
	 * Set информация о предварительном расчете.
	 *
	 * @param string|null  $info  Информация о предварительном расчете.
	 *
	 * @return static
	 */
	public function setInfo($info): self
	{
		$this->info = $info;

		return $this;
	}
}
