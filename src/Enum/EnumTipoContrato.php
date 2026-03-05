<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoContrato
{
    const FIJO = 1;
    const INDEFINIDO = 2;
    const APRENDIZAJE = 3;
    const OBRA_LABOR = 4;
    const PRACTICAS_PASANTIAS = 5;
    const ASOCIACION = 6;

    private static $descriptions = [
        ['id' => self::FIJO, 'code' => 'FIJO', 'description' => "Fijo"],
        ['id' => self::INDEFINIDO, 'code' => 'INDEFINIDO', 'description' => "Indefinido"],
        ['id' => self::APRENDIZAJE, 'code' => 'APRENDIZAJE', 'description' => "Aprendizaje"],
        ['id' => self::OBRA_LABOR, 'code' => 'OBRA_LABOR', 'description' => "Obra o Labor"],
        ['id' => self::PRACTICAS_PASANTIAS, 'code' => 'PRACTICAS_PASANTIAS', 'description' => "Prácticas o Pasantías"],
        ['id' => self::ASOCIACION, 'code' => 'ASOCIACION', 'description' => "Asociación"]
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
