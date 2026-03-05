<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumMensajes
{
    const Ingresos = 1;
    const Terminos = 2;
    const Vacaciones = 3;
    const PeriodoPrueba = 4;
    const FinalizacionContrato = 5;
    const VencimientoEstudios = 6;

    private static $descriptions = [
        ['id' => self::Ingresos, 'code' => 'Ingresos', 'description' => 'Ingresos'],
        ['id' => self::Terminos, 'code' => 'Terminos', 'description' => 'Terminos'],
        ['id' => self::Vacaciones, 'code' => 'Vacaciones', 'description' => 'Vacaciones'],
        ['id' => self::PeriodoPrueba, 'code' => 'PeriodoPrueba', 'description' => 'Periodo de Prueba'],
        ['id' => self::FinalizacionContrato, 'code' => 'FinalizacionContrato', 'description' => 'Finalizacion de Contrato'],
        ['id' => self::VencimientoEstudios, 'code' => 'VencimientoEstudios', 'description' => 'Vencimiento de Estudios'],
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
