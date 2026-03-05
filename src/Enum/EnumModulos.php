<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumModulos
{
    public const CONTRATACION = 1;
    public const LIQ_NOMINA = 2;
    public const LIQ_VACACIONES = 3;
    public const LIQ_PRESTSOCIALES = 4;
    public const LIQ_CONTRATO = 5;
    public const PRESTAMO = 6;

    private static $descriptions = [
        ['id' => self::CONTRATACION, 'code' => 'CONTRATACION', 'description' => 'Contratacion'],
        ['id' => self::LIQ_NOMINA, 'code' => 'LIQ_NOMINA', 'description' => 'Liquidación de Nómina'],
        ['id' => self::LIQ_VACACIONES, 'code' => 'LIQ_VACACIONES', 'description' => 'Liquidación de Vacaciones'],
        ['id' => self::LIQ_PRESTSOCIALES, 'code' => 'LIQ_PRESTSOCIALES', 'description' => 'Liquidación de Prestaciones Sociales'],
        ['id' => self::LIQ_CONTRATO, 'code' => 'LIQ_CONTRATO', 'description' => 'Liquidación de Contrato'],
        ['id' => self::PRESTAMO, 'code' => 'PRESTAMO', 'description' => 'Préstamo'],
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
