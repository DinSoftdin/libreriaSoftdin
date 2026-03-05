<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumParentesco
{
    public const PADRE = 1;
    public const MADRE = 2;
    public const ESPOSO = 3;
    public const HIJO = 4;
    public const HERMANO = 5;
    public const TIO = 6;
    public const OTROS = 7;

    private static $descriptions = [
        ['id' => self::PADRE, 'code' => 'PADRE', 'description' => 'Padre'],
        ['id' => self::MADRE, 'code' => 'MADRE', 'description' => 'Madre'],
        ['id' => self::ESPOSO, 'code' => 'ESPOSO', 'description' => 'Esposo(a)'],
        ['id' => self::HIJO, 'code' => 'HIJO', 'description' => 'Hijo(a)'],
        ['id' => self::HERMANO, 'code' => 'HERMANO', 'description' => 'Hermano(a)'],
        ['id' => self::TIO, 'code' => 'TIO', 'description' => 'Tio(a)'],
        ['id' => self::OTROS, 'code' => 'OTROS', 'description' => 'Otros'],
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
