<?php

declare(strict_types=1);

namespace JdeShipping\Serializer;

use JMS\Serializer\SerializerBuilder;

trait JsonSerializableTrait
{
    public function jsonSerialize(): array
    {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SnakeCasePropertyNamingStrategy())
            ->build()
            ->toArray($this);
    }
}
