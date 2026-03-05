<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumContinente
{
    public const ASIA = 1;
    public const AFRICA = 2;
    public const EUROPA = 3;
    public const AMERICA_NORTE = 4;
    public const AMERICA_SUR = 5;
    public const OCEANIA = 6;

    private static $descriptions = [
        ['id' => self::ASIA, 'code' => 'ASIA', 'description' => 'Asia'],
        ['id' => self::AFRICA, 'code' => 'AFRICA', 'description' => 'Africa'],
        ['id' => self::EUROPA, 'code' => 'EUROPA', 'description' => 'Europa'],
        ['id' => self::AMERICA_NORTE, 'code' => 'AMERICA_NORTE', 'description' => 'América del Norte'],
        ['id' => self::AMERICA_SUR, 'code' => 'AMERICA_SUR', 'description' => 'América del Sur'],
        ['id' => self::OCEANIA, 'code' => 'OCEANIA', 'description' => 'Oceanía'],
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
