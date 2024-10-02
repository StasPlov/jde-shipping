<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\ShipmentCalc;
use JdeShipping\Request\Request;
use JMS\Serializer\Annotation as JMS;

final class ShipmentCostCalcByAddressRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'calculator/PriceAddress';
	const DTO = ShipmentCalc::class;

	/**
	 * Адрес населенного пункта отправления
	 * @var string|null
	 */
	private ?string $addrFrom = null;

	/**
	 * Идентификатор КЛАДР населенного пункта отправления
	 * @var string|null
	 */
	private ?string $fromKladr = null;

	/**
	 * Адрес населенного пункта назначения
	 * @var string|null
	 */
	private ?string $addrTo = null;

	/**
	 * Идентификатор КЛАДР населенного пункта назначения
	 * @var string|null
	 */
	private ?string $toKladr = null;

	/**
	 * Тип вида доставки. Список типов доставки можно получить запросом /calculator/PriceTypeListAvailable
	 * @var int|null
	 */
	private ?int $type = null;

	/**
	 * Вес груза в кг.
	 * @var float|null
	 */
	private ?float $weight = null;

	/**
	 * Объем в м3
	 * @var float|null
	 */
	private ?float $volume = null;

	/**
	 * Длина, м. (параметры для самого габаритного места)
	 * При отсутствии параметра volume участвует в вычислении общего объема
	 * @var float|null
	 */
	private ?float $length = null;

	/**
	 * Ширина, м. (параметры для самого габаритного места)
	 * При отсутствии параметра volume участвует в вычислении общего объема
	 * @var float|null
	 */
	private ?float $width = null;

	/**
	 * Высота, м. (параметры для самого габаритного места)
	 * При отсутствии параметра volume участвует в вычислении общего объема
	 * @var float|null
	 */
	private ?float $height = null;

	/**
	 * Количество мест
	 * При отсутствии параметра volume участвует в вычислении общего объема
	 * @var int|null
	 */
	private ?int $quantity = null;

	/**
	 * Требуется ли забор груза 1 - Да | 0 - нет
	 * @var int|null
	 */
	private ?int $pickup = null;

	/**
	 * Требуется ли доставка груза 1 - Да | 0 - нет
	 * @var int|null
	 */
	private ?int $delivery = null;

	/**
	 * Объявленная ценность
	 * @var int|null
	 */
	private ?int $declared = null;

	/**
	 * Список дополнительных услуг, через запятую. Коды услуг:
	 * BRD - Евроборт, CRGREC - Внутренний пересчет, DCD - Выполнение забора груза в день заявки,
	 * DDO - Забор груза в нерабочее время, DFT - Забор груза в фиксиров. время,
	 * DLU - ПГР и перенос по территории клиента, FRAG - Доставка хрупкого грузобагажа,
	 * LATH - Обрешетка, LWHS - Загрузка груза на локальный склад, OVERS - Негабаритный груз,
	 * SOVERS - Супер негабаритный груз, TMP - Доставка в тепле
	 * @var string|null
	 */
	private ?string $services = null;

	/**
	 * Вес негабаритного груза, кг.
	 * 
	 * @JMS\SerializedName("oversizeWeight")
	 * @var float|null
	 */
	private ?float $oversizeWeight = null;

	/**
	 * Объем негабаритного груза, м3
	 * 
	 * @JMS\SerializedName("oversizeVolume")
	 * @var float|null
	 */
	private ?float $oversizeVolume = null;

	/**
	 * Объем груза для жесткой упаковки, м3
	 * 
	 * @JMS\SerializedName("obrVolume")
	 * @var float|null
	 */
	private ?float $obrVolume = null;

	/**
	 * Коэффициент обрешетки:
	 * Коэффициент 1: Без наценки за жесткую упаковку
	 * Коэффициент 1,5: Используется при жесткой упаковке витрин, стеклянных конструкций,
	 * декоративных изделий из отделочных растворов и бетонов, камня, глины, стекла
	 * Коэффициент 2: Используется при жесткой упаковке специализированного грузобагажа
	 * (гидроциклы, вездеходы, специальное оборудование и т.д.),
	 * а также при наличии мест со стороной менее 0,5 м, либо более 3м
	 * Коэффициент 3: Применяется при одновременном наличии мест со сторонами менее 0,5 м и более 3м.
	 * 
	 * @JMS\SerializedName("obrK")
	 * @var float|null
	 */
	private ?float $obrK = null;

	/**
	 * Расчет будет выполняться по индивидуальному прайсу
	 * @var bool|null
	 */
	private ?bool $individual = null;

	/**
	 * Признак обязательной маркировки груза 0 - Самостоятельная маркировка груза | 1 | либо отсутствие признака - платная маркировка груза на филиале ЖДЭ
	 * @var int|null
	 */
	private ?int $prMark = null;

	/**
	 * Информация о предварительном расчете.
	 * @var string|null
	 */
	private ?string $info = null;


	// Getters and setters for each property...

	public function getAddrFrom(): ?string
	{
		return $this->addrFrom;
	}

	public function setAddrFrom(?string $addrFrom): self
	{
		$this->addrFrom = $addrFrom;
		return $this;
	}

	public function getFromKladr(): ?string
	{
		return $this->fromKladr;
	}

	public function setFromKladr(?string $fromKladr): self
	{
		$this->fromKladr = $fromKladr;
		return $this;
	}

	public function getAddrTo(): ?string
	{
		return $this->addrTo;
	}

	public function setAddrTo(?string $addrTo): self
	{
		$this->addrTo = $addrTo;
		return $this;
	}

	public function getToKladr(): ?string
	{
		return $this->toKladr;
	}

	public function setToKladr(?string $toKladr): self
	{
		$this->toKladr = $toKladr;
		return $this;
	}

	public function getType(): ?int
	{
		return $this->type;
	}

	public function setType(?int $type): self
	{
		$this->type = $type;
		return $this;
	}

	public function getWeight(): ?float
	{
		return $this->weight;
	}

	public function setWeight(?float $weight): self
	{
		$this->weight = $weight;
		return $this;
	}

	public function getVolume(): ?float
	{
		return $this->volume;
	}

	public function setVolume(?float $volume): self
	{
		$this->volume = $volume;
		return $this;
	}

	public function getLength(): ?float
	{
		return $this->length;
	}

	public function setLength(?float $length): self
	{
		$this->length = $length;
		return $this;
	}

	public function getWidth(): ?float
	{
		return $this->width;
	}

	public function setWidth(?float $width): self
	{
		$this->width = $width;
		return $this;
	}

	public function getHeight(): ?float
	{
		return $this->height;
	}

	public function setHeight(?float $height): self
	{
		$this->height = $height;
		return $this;
	}

	public function getQuantity(): ?int
	{
		return $this->quantity;
	}

	public function setQuantity(?int $quantity): self
	{
		$this->quantity = $quantity;
		return $this;
	}

	public function getPickup(): ?int
	{
		return $this->pickup;
	}

	public function setPickup(?int $pickup): self
	{
		$this->pickup = $pickup;
		return $this;
	}

	public function getDelivery(): ?int
	{
		return $this->delivery;
	}

	public function setDelivery(?int $delivery): self
	{
		$this->delivery = $delivery;
		return $this;
	}

	public function getDeclared(): ?int
	{
		return $this->declared;
	}

	public function setDeclared(?int $declared): self
	{
		$this->declared = $declared;
		return $this;
	}

	public function getServices(): ?string
	{
		return $this->services;
	}

	public function setServices(?string $services): self
	{
		$this->services = $services;
		return $this;
	}

	public function getOversizeWeight(): ?float
	{
		return $this->oversizeWeight;
	}

	public function setOversizeWeight(?float $oversizeWeight): self
	{
		$this->oversizeWeight = $oversizeWeight;
		return $this;
	}

	public function getOversizeVolume(): ?float
	{
		return $this->oversizeVolume;
	}

	public function setOversizeVolume(?float $oversizeVolume): self
	{
		$this->oversizeVolume = $oversizeVolume;
		return $this;
	}

	public function getObrVolume(): ?float
	{
		return $this->obrVolume;
	}

	public function setObrVolume(?float $obrVolume): self
	{
		$this->obrVolume = $obrVolume;
		return $this;
	}

	public function getObrK(): ?float
	{
		return $this->obrK;
	}

	public function setObrK(?float $obrK): self
	{
		$this->obrK = $obrK;
		return $this;
	}

	public function getIndividual(): ?bool
	{
		return $this->individual;
	}

	public function setIndividual(?bool $individual): self
	{
		$this->individual = $individual;
		return $this;
	}

	public function getPrMark(): ?int
	{
		return $this->prMark;
	}

	public function setPrMark(?int $prMark): self
	{
		$this->prMark = $prMark;
		return $this;
	}

	public function getInfo(): ?string
	{
		return $this->info;
	}

	public function setInfo(?string $info): self
	{
		$this->info = $info;
		return $this;
	}
}
