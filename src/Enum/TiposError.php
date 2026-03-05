<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class TiposError
{
    const NoDefinido = 0;
    const Sintaxis = 1;
    const Identificador = 2;
    const Parentesis = 3;
    const DivisionPorCero = 4;
    const SinExpresion = 5;

    private static $descriptions = [
        ['id' => self::NoDefinido, 'code' => 'NoDefinido', 'description' => 'Error no definido'],
        ['id' => self::Sintaxis, 'code' => 'Sintaxis', 'description' => 'Error de sintaxis'],
        ['id' => self::Identificador, 'code' => 'Identificador', 'description' => 'Error de identificador'],
        ['id' => self::Parentesis, 'code' => 'Parentesis', 'description' => 'Error de paréntesis'],
        ['id' => self::DivisionPorCero, 'code' => 'DivisionPorCero', 'description' => 'Error de división por cero'],
        ['id' => self::SinExpresion, 'code' => 'SinExpresion', 'description' => 'Error de expresión vacía']
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
