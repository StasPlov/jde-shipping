<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class TransportData {
    /**
     * @JMS\Type("string")
     */
    private string $id;

    /**
     * @JMS\Type("string")
     */
    private string $description;

    /**
     * @JMS\Type("float")
     */
    private float $weight;

    /**
     * @JMS\Type(Details::class)
     */
    private Details $details;

    public function getId(): string {
        return $this->id;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getWeight(): float {
        return $this->weight;
    }

    public function getDetails(): Details {
        return $this->details;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setWeight(float $weight): void {
        $this->weight = $weight;
    }

    public function setDetails(Details $details): void {
        $this->details = $details;
    }
}
