<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoCentroCosto
{
    public const UNICO = 1;
    public const TIEMPO = 2;
    public const PORCENTAJE = 3;
    public const PORCENTAJE_TIEMPO = 4;

    private static $descriptions = [
        ['id' => self::UNICO, 'code' => 'UNICO', 'description' => 'Unico'],
        ['id' => self::TIEMPO, 'code' => 'TIEMPO', 'description' => 'Tiempo'],
        ['id' => self::PORCENTAJE, 'code' => 'PORCENTAJE', 'description' => 'Porcentaje'],
        ['id' => self::PORCENTAJE_TIEMPO, 'code' => 'PORCENTAJE_TIEMPO', 'description' => 'Porcentaje y Tiempo'],
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
