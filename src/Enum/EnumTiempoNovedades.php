<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTiempoNovedades
{
    public const Fecha = 1;
    public const Fecha_Hora = 2;

    private static $descriptions = [
        ['id' => self::Fecha, 'code' => 'Fecha', 'description' => 'Fecha'],
        ['id' => self::Fecha_Hora, 'code' => 'Fecha_Hora', 'description' => 'Fecha y Hora'],
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
