<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_Licencias
{
    const LMP = 1;
    const LR = 2;
    const LNR = 3;

    private static $descriptions = [
        ['id' => self::LMP, 'code' => 'LMP', 'description' => "LicenciasMaternidadOPaternidad"],
        ['id' => self::LR, 'code' => 'LR', 'description' => "LicenciasRemuneradas"],
        ['id' => self::LNR, 'code' => 'LNR', 'description' => "LicenciasNoRemuneradas"]
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
