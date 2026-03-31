<?php

declare(strict_types=1);

namespace softdin\servicio\Enum;

use ReflectionEnum;

/**
 * Utilidades para manejo de Enums nativos de PHP.
 */
final readonly class EnumUtils
{
    /**
     * Convierte un Enum en un arreglo asociativo valor => descripción.
     *
     * @param class-string $enumClass Nombre de la clase Enum.
     * @return array<int|string, string>
     */
    public static function enumToArray(string $enumClass): array
    {
        if (!enum_exists($enumClass)) {
            return [];
        }

        $array = [];
        foreach ($enumClass::cases() as $case) {
            $description = method_exists($case, 'description') 
                ? $case->description() 
                : self::getEnumDescription($case->name);
            
            $array[$case->value ?? $case->name] = $description;
        }

        return $array;
    }

    /**
     * Obtiene la descripción de un caso de Enum.
     */
    public static function getDescription(\UnitEnum $case): string
    {
        return method_exists($case, 'description') 
            ? $case->description() 
            : self::getEnumDescription($case->name);
    }

    /**
     * Convierte la clave del Enum (SNAKE_CASE) en descripción legible.
     */
    private static function getEnumDescription(string $enumKey): string
    {
        $words = explode("_", strtolower($enumKey));
        return ucfirst(implode(" ", $words));
    }
}
