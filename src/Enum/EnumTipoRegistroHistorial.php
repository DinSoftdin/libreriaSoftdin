<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoRegistroHistorial
{
    const CONTRATACION = 1;
    const PRORROGA = 2;
    const TERMINO = 3;
    const NOVEDADPILA = 4;

    private static $descriptions = [
        ['id' => self::CONTRATACION, 'code' => 'CONTRATACION', 'description' => "Contratación"],
        ['id' => self::PRORROGA, 'code' => 'PRORROGA', 'description' => "Prorroga"],
        ['id' => self::TERMINO, 'code' => 'TERMINO', 'description' => "Termino"],
        ['id' => self::NOVEDADPILA, 'code' => 'NOVEDADPILA', 'description' => "Novedades de PILA"]
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
