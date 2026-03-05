<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumSemana
{
    public const LV = 1;
    public const LS = 2;
    public const D = 3;

    private static $descriptions = [
        ['id' => self::LV, 'code' => 'LV', 'description' => 'Lunes a Viernes'],
        ['id' => self::LS, 'code' => 'LS', 'description' => 'Lunes a Sábado'],
        ['id' => self::D, 'code' => 'D', 'description' => 'Domingo'],
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
