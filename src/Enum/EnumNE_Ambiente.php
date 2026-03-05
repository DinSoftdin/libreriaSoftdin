<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_Ambiente
{
    const Produccion = 1;
    const Pruebas = 2;

    private static $descriptions = [
        ['id' => self::Produccion, 'code' => 'Produccion', 'description' => "Producción"],
        ['id' => self::Pruebas, 'code' => 'Pruebas', 'description' => "Pruebas"]
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
