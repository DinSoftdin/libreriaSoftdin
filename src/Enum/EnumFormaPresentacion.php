<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumFormaPresentacion
{
    public const UNICO = 1;
    public const CONSOLIDADO = 2;
    public const SUCURSAL = 3;
    public const DEPENDENCIA = 4;

    private static $descriptions = [
        ['id' => self::UNICO, 'code' => 'UNICO', 'description' => 'Único'],
        ['id' => self::CONSOLIDADO, 'code' => 'CONSOLIDADO', 'description' => 'Consolidado'],
        ['id' => self::SUCURSAL, 'code' => 'SUCURSAL', 'description' => 'Sucursal'],
        ['id' => self::DEPENDENCIA, 'code' => 'DEPENDENCIA', 'description' => 'Dependencia'],
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
