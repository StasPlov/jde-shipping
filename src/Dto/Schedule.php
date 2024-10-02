<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Schedule
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $day;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $period;

    /**
     * Get the value of day
     *
     * @return string
     */
    public function getDay(): string {
        return $this->day;
    }

    /**
     * Set the value of day
     *
     * @param string  $day  
     *
     * @return self
     */
    public function setDay(string $day): self {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of period
     *
     * @return string
     */
    public function getPeriod(): string {
        return $this->period;
    }

    /**
     * Set the value of period
     *
     * @param string  $period  
     *
     * @return self
     */
    public function setPeriod(string $period): self {
        $this->period = $period;

        return $this;
    }
}
