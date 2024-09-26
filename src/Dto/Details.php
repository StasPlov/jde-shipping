<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Details
{
	/**
	 * @JMS\Type("string")
	 */
	private string $detailInfo;

	/**
	 * @JMS\Type("DateTime<'Y-m-d'>")
	 */
	private \DateTime $createdDate;

	public function getDetailInfo(): string
	{
		return $this->detailInfo;
	}

	public function getCreatedDate(): \DateTime
	{
		return $this->createdDate;
	}

	public function setDetailInfo(string $detailInfo): void
	{
		$this->detailInfo = $detailInfo;
	}

	public function setCreatedDate(\DateTime $date): void
	{
		$this->createdDate = $date;
	}
}
