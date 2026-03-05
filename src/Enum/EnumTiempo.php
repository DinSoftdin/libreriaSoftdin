<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTiempo
{
    public const hh = 1;
    public const mm = 2;
    public const ss = 3;

    private static $descriptions = [
        ['id' => self::hh, 'code' => 'hh', 'description' => 'Hora'],
        ['id' => self::mm, 'code' => 'mm', 'description' => 'Minuto'],
        ['id' => self::ss, 'code' => 'ss', 'description' => 'Segundo'],
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
