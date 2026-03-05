<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_TipoNota
{
    const Reemplazar = 1;
    const Eliminar = 2;

    private static $descriptions = [
        ['id' => self::Reemplazar, 'code' => 'Reemplazar', 'description' => "Reemplazar"],
        ['id' => self::Eliminar, 'code' => 'Eliminar', 'description' => "Eliminar"]
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
