<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Cords
{
	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("lat")
	 */
	private string $lat;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("lng")
	 */
	private string $lng;
	
	public function getLat(): string
	{
		return $this->lat;
	}

	public function setLat(string $lat): self
	{
		$this->lat = $lat;
		return $this;
	}

	public function getLng(): string
	{
		return $this->lng;
	}

	public function setLng(string $lng): self
	{
		$this->lng = $lng;
		return $this;
	}
}
