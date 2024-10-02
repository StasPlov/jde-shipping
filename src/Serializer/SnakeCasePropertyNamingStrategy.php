<?php

declare(strict_types=1);

namespace JdeShipping\Serializer;

use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

final class SnakeCasePropertyNamingStrategy implements PropertyNamingStrategyInterface
{
    public function translateName(PropertyMetadata $property): string
    {
        return self::camelToSnake($property->name);
    }

	private static function camelToSnake($camelCase) { 
		$pattern = '/(?<=\\w)(?=[A-Z])|(?<=[a-z])(?=[0-9])/'; 
		$snakeCase = preg_replace($pattern, '_', $camelCase); 
		return strtolower($snakeCase); 
	} 
}
