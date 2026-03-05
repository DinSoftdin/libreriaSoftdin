<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumDiasSemana
{
    const LUNES = 1;
    const MARTES = 2;
    const MIERCOLES = 3;
    const JUEVES = 4;
    const VIERNES = 5;
    const SABADO = 6;
    const DOMINGO = 7;

    private static $descriptions = [
        ['id' => self::LUNES, 'code' => 'LUNES', 'description' => 'Lunes'],
        ['id' => self::MARTES, 'code' => 'MARTES', 'description' => 'Martes'],
        ['id' => self::MIERCOLES, 'code' => 'MIERCOLES', 'description' => 'Miercoles'],
        ['id' => self::JUEVES, 'code' => 'JUEVES', 'description' => 'Jueves'],
        ['id' => self::VIERNES, 'code' => 'VIERNES', 'description' => 'Viernes'],
        ['id' => self::SABADO, 'code' => 'SABADO', 'description' => 'Sabado'],
        ['id' => self::DOMINGO, 'code' => 'DOMINGO', 'description' => 'Domingo'],
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
