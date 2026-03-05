<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumUtils
{
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

    private static function getEnumDescription($enumKey)
    {
        $words = explode("_", strtolower($enumKey));
        $description = ucfirst(implode(" ", $words));
        return $description;
    }
}

