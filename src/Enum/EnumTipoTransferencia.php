<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoTransferencia
{
    const CONSIGNACION = 1;
    const CHEQUE = 2;

    private static $descriptions = [
        ['id' => self::CONSIGNACION, 'code' => 'CONSIGNACION', 'description' => "Consignación"],
        ['id' => self::CHEQUE, 'code' => 'CHEQUE', 'description' => "Cheque"]
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
