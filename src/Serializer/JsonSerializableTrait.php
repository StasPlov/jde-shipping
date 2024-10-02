<?php

declare(strict_types=1);

namespace JdeShipping\Serializer;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;

trait JsonSerializableTrait
{
    public function jsonSerialize(): array
    {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build()
            ->toArray($this);
    }
}
