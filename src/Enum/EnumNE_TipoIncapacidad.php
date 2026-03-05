<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_TipoIncapacidad
{
    const Comun = 1;
    const Profesional = 2;
    const Laboral = 3;

    private static $descriptions = [
        ['id' => self::Comun, 'code' => 'Comun', 'description' => "Común"],
        ['id' => self::Profesional, 'code' => 'Profesional', 'description' => "Profesional"],
        ['id' => self::Laboral, 'code' => 'Laboral', 'description' => "Laboral"]
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
