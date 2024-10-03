<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Location
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $code;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $title;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $kladrCode;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $kladrCodeCity;


	/**
	 * @JMS\Type("bool")
	 * @var bool
	 */
	private bool $aexOnly;

	/**
	 * @JMS\Type("bool")
	 * @var bool
	 */
	private bool $mstPrAex;

	/**
	 * @JMS\Type("bool")
	 * @var bool
	 */
	private bool $mstPrVirt;

	/**
	 * @JMS\Type("int")
	 * @var int
	 * @deprecated 1.0.0
	 */
	private int $mstPrTrs;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $addr;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $features;

	/**
	 * @JMS\Type("JdeShipping\Dto\Cords")
	 * @var Cords
	 */
	private Cords $coords;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $city;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $countryCode;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $contryName;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $maxVes;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $maxObyom;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $maxVesGm;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("max_l_gm")
	 * @var string
	 */
	private string $maxObyomGm;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("max_l_gm")
	 * @var string
	 */
	private string $maxLGm;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("max_w_gm")
	 * @var string
	 */
	private string $maxWGm;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("max_h_gm")
	 * @var string
	 */
	private string $maxHGm;

	/**
	 * Идентификатор терминала, использутся для расчета стоимости доставки при использовании /calculator/price
	 *
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @param string  $code  
	 *
	 * @return self
	 */
	public function setCode(string $code): self
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Название терминала (филиала)
	 *
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param string  $title  
	 *
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Код КЛАДР адреса филиала
	 *
	 * @return string
	 */
	public function getKladrCode(): string
	{
		return $this->kladrCode;
	}

	/**
	 * Set the value of kladrCode
	 *
	 * @param string  $kladrCode  
	 *
	 * @return self
	 */
	public function setKladrCode(string $kladrCode): self
	{
		$this->kladrCode = $kladrCode;

		return $this;
	}

	/**
	 * Код КЛАДР города, где расположен филиал
	 *
	 * @return string
	 */
	public function getKladrCodeCity(): string
	{
		return $this->kladrCodeCity;
	}

	/**
	 * Set the value of kladrCodeCity
	 *
	 * @param string  $kladrCodeCity  
	 *
	 * @return self
	 */
	public function setKladrCodeCity(string $kladrCodeCity): self
	{
		$this->kladrCodeCity = $kladrCodeCity;

		return $this;
	}

	/**
	 * Прием/Выдача груза осуществляется только путем автоэкспедирования (забора/доставки) 0/1
	 *
	 * @return bool
	 */
	public function getAexOnly(): bool
	{
		return $this->aexOnly;
	}

	/**
	 * Set the value of aexOnly
	 *
	 * @param bool  $aexOnly  
	 *
	 * @return self
	 */
	public function setAexOnly(bool $aexOnly): self
	{
		$this->aexOnly = $aexOnly;

		return $this;
	}

	/**
	 * Наличие услуги Автоэкспедирования на станции 

	 * true - услуга оказывается
	 * false - услуга не оказывается
	 *
	 * @return bool
	 */
	public function getMstPrAex(): bool
	{
		return $this->mstPrAex;
	}

	/**
	 * Set the value of mstPrAex
	 *
	 * @param bool  $mstPrAex  
	 *
	 * @return self
	 */
	public function setMstPrAex(bool $mstPrAex): self
	{
		$this->mstPrAex = $mstPrAex;

		return $this;
	}

	/**
	 * Признак виртуального склада - true/false
	 *
	 * @return bool
	 */
	public function getMstPrVirt(): bool
	{
		return $this->mstPrVirt;
	}

	/**
	 * Set the value of mstPrVirt
	 *
	 * @param bool  $mstPrVirt  
	 *
	 * @return self
	 */
	public function setMstPrVirt(bool $mstPrVirt): self
	{
		$this->mstPrVirt = $mstPrVirt;

		return $this;
	}

	/**
	 * Bit-Маска вида обрабатываемых тр.средств 
	 * 
	 * 0 - вагоны
	 * 1 - авто
	 * 2 - контейнеры
	 * 3 - локальные авто
	 * 4 - авиа
	 *
	 * @return int
	 * 
	 * @deprecated 1.0.0
	 */
	public function getMstPrTrs(): int
	{
		return $this->mstPrTrs;
	}

	/**
	 * Set the value of mstPrTrs
	 *
	 * @param int  $mstPrTrs  
	 *
	 * @return self
	 * 
	 * @deprecated 1.0.0
	 */
	public function setMstPrTrs(int $mstPrTrs): self
	{
		$this->mstPrTrs = $mstPrTrs;

		return $this;
	}

	/**
	 * Адрес терминала
	 *
	 * @return string
	 */
	public function getAddr(): string
	{
		return $this->addr;
	}

	/**
	 * Set the value of addr
	 *
	 * @param string  $addr  
	 *
	 * @return self
	 */
	public function setAddr(string $addr): self
	{
		$this->addr = $addr;

		return $this;
	}

	/**
	 * Особые условия работы филиала
	 *
	 * @return string
	 */
	public function getFeatures(): string
	{
		return $this->features;
	}

	/**
	 * Set the value of features
	 *
	 * @param string  $features  
	 *
	 * @return self
	 */
	public function setFeatures(string $features): self
	{
		$this->features = $features;

		return $this;
	}

	/**
	 * Координаты терминала
	 *
	 * @return Cords
	 */
	public function getCoords(): Cords
	{
		return $this->coords;
	}

	/**
	 * Set the value of coords
	 *
	 * @param Cords  $coords  
	 *
	 * @return self
	 */
	public function setCoords(Cords $coords): self
	{
		$this->coords = $coords;

		return $this;
	}

	/**
	 * Название города
	 *
	 * @return string
	 */
	public function getCity(): string
	{
		return $this->city;
	}

	/**
	 * Set the value of city
	 *
	 * @param string  $city  
	 *
	 * @return self
	 */
	public function setCity(string $city): self
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * Код страны
	 *
	 * @return string
	 */
	public function getCountryCode(): string
	{
		return $this->countryCode;
	}

	/**
	 * Set the value of countryCode
	 *
	 * @param string  $countryCode  
	 *
	 * @return self
	 */
	public function setCountryCode(string $countryCode): self
	{
		$this->countryCode = $countryCode;

		return $this;
	}

	/**
	 * Название страны
	 *
	 * @return string
	 */
	public function getContryName(): string
	{
		return $this->contryName;
	}

	/**
	 * Set the value of contryName
	 *
	 * @param string  $contryName  
	 *
	 * @return self
	 */
	public function setContryName(string $contryName): self
	{
		$this->contryName = $contryName;

		return $this;
	}

	/**
	 * Максимальный вес по ТТН - кг 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxVes(): string
	{
		return $this->maxVes;
	}

	/**
	 * Set the value of maxVes
	 *
	 * @param string  $maxVes  
	 *
	 * @return self
	 */
	public function setMaxVes(string $maxVes): self
	{
		$this->maxVes = $maxVes;

		return $this;
	}

	/**
	 * Максимальный объем по ТТН - куб. метр 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxObyom(): string
	{
		return $this->maxObyom;
	}

	/**
	 * Set the value of maxObyom
	 *
	 * @param string  $maxObyom  
	 *
	 * @return self
	 */
	public function setMaxObyom(string $maxObyom): self
	{
		$this->maxObyom = $maxObyom;

		return $this;
	}

	/**
	 * Максимальный вес (кг) 1 усредненного груза 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxVesGm(): string
	{
		return $this->maxVesGm;
	}

	/**
	 * Set the value of maxVesGm
	 *
	 * @param string  $maxVesGm  
	 *
	 * @return self
	 */
	public function setMaxVesGm(string $maxVesGm): self
	{
		$this->maxVesGm = $maxVesGm;

		return $this;
	}

	/**
	 * Максимальный объем (куб. метр) 1 усредненного груза 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxObyomGm(): string
	{
		return $this->maxObyomGm;
	}

	/**
	 * Set the value of maxObyomGm
	 *
	 * @param string  $maxObyomGm  
	 *
	 * @return self
	 */
	public function setMaxObyomGm(string $maxObyomGm): self
	{
		$this->maxObyomGm = $maxObyomGm;

		return $this;
	}

	/**
	 * Максимальная ДЛИНА (м) 1 груза 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxLGm(): string
	{
		return $this->maxLGm;
	}

	/**
	 * Set the value of maxLGm
	 *
	 * @param string  $maxLGm  
	 *
	 * @return self
	 */
	public function setMaxLGm(string $maxLGm): self
	{
		$this->maxLGm = $maxLGm;

		return $this;
	}

	/**
	 * Максимальная ШИРИНА (м) 1 груза 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxWGm(): string
	{
		return $this->maxWGm;
	}

	/**
	 * Set the value of maxWGm
	 *
	 * @param string  $maxWGm  
	 *
	 * @return self
	 */
	public function setMaxWGm(string $maxWGm): self
	{
		$this->maxWGm = $maxWGm;

		return $this;
	}

	/**
	 * Максимальная ВЫСОТА (м) 1 груза 
	 * 
	 * 0 - ограничения не установлены
	 *
	 * @return string
	 */
	public function getMaxHGm(): string
	{
		return $this->maxHGm;
	}

	/**
	 * Set the value of maxHGm
	 *
	 * @param string  $maxHGm  
	 *
	 * @return self
	 */
	public function setMaxHGm(string $maxHGm): self
	{
		$this->maxHGm = $maxHGm;

		return $this;
	}
}
