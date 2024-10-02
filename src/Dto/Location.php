<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Location
{
	/**
	 * @JMS\Type("string")
	 */
	private string $code;

	/**
	 * @JMS\Type("string")
	 */
	private string $title;

	/**
	 * @JMS\Type("string")
	 */
	private string $kladrCode;

	/**
	 * @JMS\Type("string")
	 */
	private string $kladrCodeCity;

	/**
	 * @JMS\Type("string")
	 */
	private string $addr;

	/**
	 * @JMS\Type("boolean")
	 */
	private bool $aexOnly;

	/**
	 * @JMS\Type("boolean")
	 */
	private bool $mstPrAex;

	/**
	 * @JMS\Type("boolean")
	 */
	private bool $mstPrVirt;

	/**
	 * @JMS\Type("string")
	 */
	private string $features;

	/**
	 * @JMS\Type("Dto\LocationCords")
	 */
	private Cords $coords;

	/**
	 * @JMS\Type("string")
	 */
	private string $city;

	/**
	 * @JMS\Type("string")
	 */
	private string $countryCode;

	/**
	 * @JMS\Type("string")
	 */
	private string $contryName;

	/**
	 * @JMS\Type("string")
	 */
	private string $maxVes;

	/**
	 * @JMS\Type("string")
	 */
	private string $maxObyom;

	/**
	 * @JMS\Type("string")
	 */
	private string $maxVesGm;

	/**
	 * @JMS\Type("string")
	 */
	private string $maxObyomGm;

	/**
	 * @JMS\Type("string")
	 */
	private string $max_l_gm;

	/**
	 * @JMS\Type("string")
	 */
	private string $max_w_gm;

	/**
	 * @JMS\Type("string")
	 */
	private string $max_h_gm;

	// Getters and setters for the properties

	public function getCode(): string
	{
		return $this->code;
	}

	public function setCode(string $code): self
	{
		$this->code = $code;
		return $this;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $title): self
	{
		$this->title = $title;
		return $this;
	}

	public function getKladrCode(): string
	{
		return $this->kladrCode;
	}

	public function setKladrCode(string $kladrCode): self
	{
		$this->kladrCode = $kladrCode;
		return $this;
	}

	public function getKladrCodeCity(): string
	{
		return $this->kladrCodeCity;
	}

	public function setKladrCodeCity(string $kladrCodeCity): self
	{
		$this->kladrCodeCity = $kladrCodeCity;
		return $this;
	}

	public function getAddr(): string
	{
		return $this->addr;
	}

	public function setAddr(string $addr): self
	{
		$this->addr = $addr;
		return $this;
	}

	public function getAexOnly(): bool
	{
		return $this->aexOnly;
	}

	public function setAexOnly(bool $aexOnly): self
	{
		$this->aexOnly = $aexOnly;
		return $this;
	}

	public function getMstPrAex(): bool
	{
		return $this->mstPrAex;
	}

	public function setMstPrAex(bool $mstPrAex): self
	{
		$this->mstPrAex = $mstPrAex;
		return $this;
	}

	public function getMstPrVirt(): bool
	{
		return $this->mstPrVirt;
	}

	public function setMstPrVirt(bool $mstPrVirt): self
	{
		$this->mstPrVirt = $mstPrVirt;
		return $this;
	}

	public function getFeatures(): string
	{
		return $this->features;
	}

	public function setFeatures(string $features): self
	{
		$this->features = $features;
		return $this;
	}

	public function getCoords(): Cords
	{
		return $this->coords;
	}

	public function setCoords(Cords $coords): self
	{
		$this->coords = $coords;
		return $this;
	}

	public function getCity(): string
	{
		return $this->city;
	}

	public function setCity(string $city): self
	{
		$this->city = $city;
		return $this;
	}

	public function getCountryCode(): string
	{
		return $this->countryCode;
	}

	public function setCountryCode(string $countryCode): self
	{
		$this->countryCode = $countryCode;
		return $this;
	}

	public function getContryName(): string
	{
		return $this->contryName;
	}

	public function setContryName(string $contryName): self
	{
		$this->contryName = $contryName;
		return $this;
	}

	public function getMaxVes(): string
	{
		return $this->maxVes;
	}

	public function setMaxVes(string $maxVes): self
	{
		$this->maxVes = $maxVes;
		return $this;
	}

	public function getMaxObyom(): string
	{
		return $this->maxObyom;
	}

	public function setMaxObyom(string $maxObyom): self
	{
		$this->maxObyom = $maxObyom;
		return $this;
	}

	public function getMaxVesGm(): string
	{
		return $this->maxVesGm;
	}

	public function setMaxVesGm(string $maxVesGm): self
	{
		$this->maxVesGm = $maxVesGm;
		return $this;
	}

	public function getMaxObyomGm(): string
	{
		return $this->maxObyomGm;
	}

	public function setMaxObyomGm(string $maxObyomGm): self
	{
		$this->maxObyomGm = $maxObyomGm;
		return $this;
	}

	public function getMaxLGm(): string
	{
		return $this->max_l_gm;
	}

	public function setMaxLGm(string $max_l_gm): self
	{
		$this->max_l_gm = $max_l_gm;
		return $this;
	}

	public function getMaxWGm(): string
	{
		return $this->max_w_gm;
	}

	public function setMaxWGm(string $max_w_gm): self
	{
		$this->max_w_gm = $max_w_gm;
		return $this;
	}

	public function getMaxHGm(): string
	{
		return $this->max_h_gm;
	}

	public function setMaxHGm(string $max_h_gm): self
	{
		$this->max_h_gm = $max_h_gm;
		return $this;
	}
}
