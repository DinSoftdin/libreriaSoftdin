<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoRegistroLiquidacion
{
    const ANTICIPO = 1;
    const PAGO = 2;
    const PAGO_SD = 3;

    private static $descriptions = [
        ['id' => self::ANTICIPO, 'code' => 'ANTICIPO', 'description' => "Anticipo"],
        ['id' => self::PAGO, 'code' => 'PAGO', 'description' => "Pago"],
        ['id' => self::PAGO_SD, 'code' => 'PAGO_SD', 'description' => "Pago SD"]
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
