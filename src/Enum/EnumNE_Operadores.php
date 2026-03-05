<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumNE_Operadores
{
    public const Facturaxion = 1;
    public const Dian = 2;

    private static $descriptions = [
        ['id' => self::Facturaxion, 'code' => 'Facturaxion', 'description' => 'Facturación'],
        ['id' => self::Dian, 'code' => 'Dian', 'description' => 'DIAN'],
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
