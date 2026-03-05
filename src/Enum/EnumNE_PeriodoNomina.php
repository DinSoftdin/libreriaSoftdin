<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_PeriodoNomina
{
    const Semanal = 1;
    const Decenal = 2;
    const Catorcenal = 3;
    const Quincenal = 4;
    const Mensual = 5;
    const Otro = 6;

    private static $descriptions = [
        ['id' => self::Semanal, 'code' => 'Semanal', 'description' => "Semanal"],
        ['id' => self::Decenal, 'code' => 'Decenal', 'description' => "Decenal"],
        ['id' => self::Catorcenal, 'code' => 'Catorcenal', 'description' => "Catorcenal"],
        ['id' => self::Quincenal, 'code' => 'Quincenal', 'description' => "Quincenal"],
        ['id' => self::Mensual, 'code' => 'Mensual', 'description' => "Mensual"],
        ['id' => self::Otro, 'code' => 'Otro', 'description' => "Otro"]
    ];

    public static function getCollection()
    {
        return collect(self::$descriptions);
    }

    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    public static function getAll()
    {
        return self::$descriptions;
    }

    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }

}
