<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_Vacaciones
{
    const VC = 1;
    const VCP = 2;

    private static $descriptions = [
        ['id' => self::VC, 'code' => 'VC', 'description' => "Vacaciones Comunes"],
        ['id' => self::VCP, 'code' => 'VCP', 'description' => "Vacaciones Compensadas"]
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
