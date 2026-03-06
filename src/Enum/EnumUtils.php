<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

/**
 * Utilidades para conversión y manejo de clases Enum.
 */
class EnumUtils
{
    /**
     * Convierte una clase Enum en un arreglo asociativo valor => descripción.
     *
     * @param class-string $enumClass Nombre de la clase Enum.
     * @return array<string, string> Arreglo con valor como clave y descripción como valor.
     */
    public static function enumToArray($enumClass)
    {
        $reflection = new \ReflectionClass($enumClass);
        $enums = $reflection->getConstants();
        $enumArray = [];

        foreach ($enums as $key => $value) {
            $enumArray[$value] = self::getDescription($enumClass, $value);
        }

        return $enumArray;
    }

    /**
     * Obtiene la descripción legible de un valor de Enum.
     *
     * @param class-string $enumClass Nombre de la clase Enum.
     * @param mixed        $value     Valor del Enum.
     * @return string|null Descripción del valor, o null si no se encuentra.
     */
    public static function getDescription($enumClass, $value)
    {
        $reflection = new \ReflectionClass($enumClass);
        $description = null;

        foreach ($reflection->getConstants() as $key => $val) {
            if ($val === $value) {
                $description = self::getEnumDescription($key);
                break;
            }
        }

        return $description;
    }

    /**
     * Convierte la clave del Enum (formato SNAKE_CASE) en descripción legible.
     *
     * @param string $enumKey Clave del Enum (ej: TIPO_PAGO).
     * @return string Descripción formateada (ej: Tipo pago).
     */
    private static function getEnumDescription($enumKey)
    {
        $words = explode("_", strtolower($enumKey));
        $description = ucfirst(implode(" ", $words));
        return $description;
    }
}

