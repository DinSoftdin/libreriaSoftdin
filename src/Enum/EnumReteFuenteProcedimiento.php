<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumReteFuenteProcedimiento
{
    const PROCED_UNO = 1;
    const PROCED_DOS = 2;

    private static $descriptions = [
        ['id' => self::PROCED_UNO, 'code' => 'PROCED1', 'description' => "Procedimiento UNO"],
        ['id' => self::PROCED_DOS, 'code' => 'PROCED2', 'description' => "Procedimiento DOS"],
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
