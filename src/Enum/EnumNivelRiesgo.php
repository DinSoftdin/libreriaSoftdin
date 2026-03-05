<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNivelRiesgo
{
    public const RIESGO_I = 1;
    public const RIESGO_II = 2;
    public const RIESGO_III = 3;
    public const RIESGO_IV = 4;
    public const RIESGO_V = 5;

    private static $descriptions = [
        ['id' => self::RIESGO_I, 'code' => 0.522, 'description' => 'Riesgo I'],
        ['id' => self::RIESGO_II, 'code' => 1.044, 'description' => 'Riesgo II'],
        ['id' => self::RIESGO_III, 'code' => 2.436, 'description' => 'Riesgo III'],
        ['id' => self::RIESGO_IV, 'code' => 4.350, 'description' => 'Riesgo IV'],
        ['id' => self::RIESGO_V, 'code' => 6.960, 'description' => 'Riesgo V'],
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
