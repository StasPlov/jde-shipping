<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\LocationByKladr;
use JdeShipping\Request\Request;

final class GeoSearchByKladrRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'geo/MstByKladr';
	const DTO = LocationByKladr::class;

	/**
	 * @var string|null
	 */
	private ?string $kladrCode = null;

	/**
	 * @var string|null
	 */
	private ?string $mstCount = null;

	/**
	 * @var string|null
	 */
	private ?string $mstIn = null;

	/**
	 * @var string|null
	 */
	private ?string $mstOut = null;

	/**
	 * @var string|null
	 */
	private ?string $mstAex = null;

	/**
	 * @var string|null
	 */
	private ?string $mstDistance = null;

	/**
	 * @var string|null
	 */
	private ?string $nearKg = null;

	/**
	 * @var string|null
	 */
	private ?string $prAexo = null;

	/**
	 * Get the value of kladrCode
	 *
	 * @return string|null
	 */
	public function getKladrCode(): ?string
	{
		return $this->kladrCode;
	}

	/**
	 * Set the value of kladrCode
	 *
	 * @param string|null  $kladrCode  
	 *
	 * @return self
	 */
	public function setKladrCode($kladrCode): self
	{
		$this->kladrCode = $kladrCode;

		return $this;
	}

	/**
	 * Get the value of mstCount
	 *
	 * @return string|null
	 */
	public function getMstCount(): ?string
	{
		return $this->mstCount;
	}

	/**
	 * Set the value of mstCount
	 *
	 * @param string|null  $mstCount  
	 *
	 * @return self
	 */
	public function setMstCount($mstCount): self
	{
		$this->mstCount = $mstCount;

		return $this;
	}

	/**
	 * Get the value of mstIn
	 *
	 * @return string|null
	 */
	public function getMstIn(): ?string
	{
		return $this->mstIn;
	}

	/**
	 * Set the value of mstIn
	 *
	 * @param string|null  $mstIn  
	 *
	 * @return self
	 */
	public function setMstIn($mstIn): self
	{
		$this->mstIn = $mstIn;

		return $this;
	}

	/**
	 * Get the value of mstOut
	 *
	 * @return string|null
	 */
	public function getMstOut(): ?string
	{
		return $this->mstOut;
	}

	/**
	 * Set the value of mstOut
	 *
	 * @param string|null  $mstOut  
	 *
	 * @return self
	 */
	public function setMstOut($mstOut): self
	{
		$this->mstOut = $mstOut;

		return $this;
	}

	/**
	 * Get the value of mstAex
	 *
	 * @return string|null
	 */
	public function getMstAex(): ?string
	{
		return $this->mstAex;
	}

	/**
	 * Set the value of mstAex
	 *
	 * @param string|null  $mstAex  
	 *
	 * @return self
	 */
	public function setMstAex($mstAex): self
	{
		$this->mstAex = $mstAex;

		return $this;
	}

	/**
	 * Get the value of mstDistance
	 *
	 * @return string|null
	 */
	public function getMstDistance(): ?string
	{
		return $this->mstDistance;
	}

	/**
	 * Set the value of mstDistance
	 *
	 * @param string|null  $mstDistance  
	 *
	 * @return self
	 */
	public function setMstDistance($mstDistance): self
	{
		$this->mstDistance = $mstDistance;

		return $this;
	}

	/**
	 * Get the value of nearKg
	 *
	 * @return string|null
	 */
	public function getNearKg(): ?string
	{
		return $this->nearKg;
	}

	/**
	 * Set the value of nearKg
	 *
	 * @param string|null  $nearKg  
	 *
	 * @return self
	 */
	public function setNearKg($nearKg): self
	{
		$this->nearKg = $nearKg;

		return $this;
	}

	/**
	 * Get the value of prAexo
	 *
	 * @return string|null
	 */
	public function getPrAexo(): ?string
	{
		return $this->prAexo;
	}

	/**
	 * Set the value of prAexo
	 *
	 * @param string|null  $prAexo  
	 *
	 * @return self
	 */
	public function setPrAexo($prAexo): self
	{
		$this->prAexo = $prAexo;

		return $this;
	}
}
