<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoCuota
{
    const QUINCENAL = 1;
    const MENSUAL = 2;

    private static $descriptions = [
        ['id' => self::QUINCENAL, 'code' => 'QUINCENAL', 'description' => 'Quincenal'],
        ['id' => self::MENSUAL, 'code' => 'MENSUAL', 'description' => 'Mensual'],
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
