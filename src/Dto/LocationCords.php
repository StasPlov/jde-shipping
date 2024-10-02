<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class LocationCords
{
	/**
	 * @JMS\Type("string")
	 */
	private string $lat;

	/**
	 * @JMS\Type("string")
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
