<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoNumeroPILA
{
    public const N = 1;
    public const A = 2;

    private static $descriptions = [
        ['id' => self::N, 'code' => 'N', 'description' => 'N'],
        ['id' => self::A, 'code' => 'A', 'description' => 'A'],
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
