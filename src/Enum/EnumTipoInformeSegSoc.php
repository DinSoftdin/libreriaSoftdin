<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoInformeSegSoc
{
    const PILA = 1;
    const PROVISION = 2;

    private static $descriptions = [
        ['id' => self::PILA, 'code' => 'PILA', 'description' => "PILA"],
        ['id' => self::PROVISION, 'code' => 'PROVISION', 'description' => "Provisión"]
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
