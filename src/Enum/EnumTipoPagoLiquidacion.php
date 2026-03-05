<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoPagoLiquidacion
{
    const NOMINA = 1;
    const TESORERIA = 2;
    const FONDO = 3;
    const AHORRO = 4;

    private static $descriptions = [
        ['id' => self::NOMINA, 'code' => 'NOMINA', 'description' => "Nómina"],
        ['id' => self::TESORERIA, 'code' => 'TESORERIA', 'description' => "Tesorería"],
        ['id' => self::FONDO, 'code' => 'FONDO', 'description' => "Fondo"],
        ['id' => self::AHORRO, 'code' => 'AHORRO', 'description' => "Ahorro"]
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
