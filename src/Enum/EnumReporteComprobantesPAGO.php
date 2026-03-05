<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumReporteComprobantesPAGO
{
    public const GENERAL = 1;
    public const DETALLADO_INGRESOS = 2;
    public const DETALLADO_MODALIDAD = 3;
    public const DETALLADO_PRESTAMOS = 4;
    public const RESUMEN = 5;

    private static $descriptions = [
        ['id' => self::GENERAL, 'code' => 'GENERAL', 'description' => 'General'],
        ['id' => self::DETALLADO_INGRESOS, 'code' => 'DETALLADO_INGRESOS', 'description' => 'Detallado de Ingresos'],
        ['id' => self::DETALLADO_MODALIDAD, 'code' => 'DETALLADO_MODALIDAD', 'description' => 'Detallado Modalidad'],
        ['id' => self::DETALLADO_PRESTAMOS, 'code' => 'DETALLADO_PRESTAMOS', 'description' => 'Detallado Prestamos'],
        ['id' => self::RESUMEN, 'code' => 'RESUMEN', 'description' => 'Resumen'],
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
