<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumModalidadEjecucionNomina
{
    public const INGRESO = 1;
    public const DEDUCCION = 2;
    public const PROV_SEG = 3;
    public const PROV_PRF = 4;
    public const PROV_ARL = 5;
    public const PROV_PRS = 6;
    public const VACACIONES = 7;

    private static $descriptions = [
        ['id' => self::INGRESO, 'code' => 'INGRESO', 'description' => 'Ingreso'],
        ['id' => self::DEDUCCION, 'code' => 'DEDUCCION', 'description' => 'Deducción'],
        ['id' => self::PROV_SEG, 'code' => 'PROV_SEG', 'description' => 'Provisión Seguridad Social'],
        ['id' => self::PROV_PRF, 'code' => 'PROV_PRF', 'description' => 'Provisión Parafiscales'],
        ['id' => self::PROV_ARL, 'code' => 'PROV_ARL', 'description' => 'Provisión Riesgos Laborales'],
        ['id' => self::PROV_PRS, 'code' => 'PROV_PRS', 'description' => 'Provisión Prestaciones Sociales'],
        ['id' => self::VACACIONES, 'code' => 'VACACIONES', 'description' => 'Vacaciones'],
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
