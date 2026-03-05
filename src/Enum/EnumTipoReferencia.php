<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoReferencia
{
    const PERSONAL = 1;
    const FAMILIAR = 2;

    private static $descriptions = [
        ['id' => self::PERSONAL, 'code' => 'PERSONAL', 'description' => "Personal"],
        ['id' => self::FAMILIAR, 'code' => 'FAMILIAR', 'description' => "Familiar"]
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
