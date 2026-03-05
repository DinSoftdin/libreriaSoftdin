<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoRegimen
{
    const SIMPLIFICADO = 1;
    const COMUN = 2;
    const GRAN_CONTRIBUYENTE = 3;

    private static $descriptions = [
        ['id' => self::SIMPLIFICADO, 'code' => 'SIMPLIFICADO', 'description' => "Simplificado"],
        ['id' => self::COMUN, 'code' => 'COMUN', 'description' => "Común"],
        ['id' => self::GRAN_CONTRIBUYENTE, 'code' => 'GRAN_CONTRIBUYENTE', 'description' => "Gran Contribuyente"]
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
