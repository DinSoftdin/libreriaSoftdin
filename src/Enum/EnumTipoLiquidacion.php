<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoLiquidacion
{
    const LEY = 1;
    const PROVISIONES = 2;

    private static $descriptions = [
        ['id' => self::LEY, 'code' => 'LEY', 'description' => "Ley"],
        ['id' => self::PROVISIONES, 'code' => 'PROVISIONES', 'description' => "Provisiones"]
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
