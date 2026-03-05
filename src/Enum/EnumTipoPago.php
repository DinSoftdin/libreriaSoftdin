<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoPago
{
    public const COMERCIAL = 1;
    public const CALENDARIO = 2;

    private static $descriptions = [
        ['id' => self::COMERCIAL, 'code' => 'COMERCIAL', 'description' => 'Comercial'],
        ['id' => self::CALENDARIO, 'code' => 'CALENDARIO', 'description' => 'Calendario'],
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
