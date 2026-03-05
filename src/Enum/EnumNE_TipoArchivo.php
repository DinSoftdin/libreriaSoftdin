<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumNE_TipoArchivo
{
    public const N = 1;
    public const E = 2;
    public const A = 3;

    private static $descriptions = [
        ['id' => self::N, 'code' => 'N', 'description' => 'Tipo N'],
        ['id' => self::E, 'code' => 'E', 'description' => 'Tipo E'],
        ['id' => self::A, 'code' => 'A', 'description' => 'Tipo A'],
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
