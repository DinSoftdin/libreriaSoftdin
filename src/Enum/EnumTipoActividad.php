<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoActividad
{
    const COMERCIAL = 1;
    const SERVICIO = 2;
    const INDUSTRIAL = 3;

    private static $descriptions = [
        ['id' => self::COMERCIAL, 'code' => 'COM', 'description' => "Comercial"],
        ['id' => self::SERVICIO, 'code' => 'SER', 'description' => "Servicio"],
        ['id' => self::INDUSTRIAL, 'code' => 'IND', 'description' => "Industrial"]
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
