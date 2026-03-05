<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoPersona
{
    const NATURAL = 1;
    const JURIDICA = 2;

    private static $descriptions = [
        ['id' => self::NATURAL, 'code' => 'NAT', 'description' => "Natural"],
        ['id' => self::JURIDICA, 'code' => 'JUR', 'description' => "Jurídica"]
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
