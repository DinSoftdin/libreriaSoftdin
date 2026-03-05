<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoConceptoMO
{
    public const DEFAULT = 1;
    public const ADICIONAL = 2;

    private static $descriptions = [
        ['id' => self::DEFAULT , 'code' => 'DEFAULT', 'description' => 'Default'],
        ['id' => self::ADICIONAL, 'code' => 'ADICIONAL', 'description' => 'Adicional'],
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
